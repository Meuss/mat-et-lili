<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Invités';

    protected static ?string $title = 'Invité';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()->schema([
                    Forms\Components\TextInput::make('first_name')
                        ->label('Prénom')
                        ->required(),
                    Forms\Components\TextInput::make('last_name')
                        ->label('Nom')
                        ->required(),
                    Forms\Components\Checkbox::make('supper')
                        ->label('Présent au souper')
                        ->default(true),
                    Forms\Components\Select::make('menu')
                        ->label('Menu')
                        ->options([
                            'Carnivore' => 'Carnivore',
                            'Végétarien' => 'Végétarien',
                        ])
                        ->required(),
                    Forms\Components\Textarea::make('allergies')
                        ->label('Allergies'),
                    Forms\Components\Checkbox::make('sleep')
                        ->label('Dort sur place')
                        ->default(false),
                    Forms\Components\Fieldset::make('Submission')
                        ->relationship('submission')
                        ->schema([
                            Forms\Components\TextInput::make('email'),
                            Forms\Components\TextInput::make('phone'),
                            Forms\Components\Textarea::make('comment'),
                        ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('supper')
                    ->label('Souper')
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('sleep')
                    ->label('Dort sur place')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'view' => Pages\ViewGuest::route('/{record}'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
