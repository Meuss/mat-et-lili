<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $icon = 'heroicon-o-user';

    protected static ?string $label = 'Invités';
    protected static ?string $navigationLabel = 'Invités';

    protected static ?string $title = 'Invité';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    TextInput::make('first_name')
                        ->label('Prénom')
                        ->required(),
                    TextInput::make('last_name')
                        ->label('Nom')
                        ->required(),
                    Textarea::make('allergies')
                        ->label('Allergies'),
                    Checkbox::make('sleep')
                        ->label('Dort sur place')
                        ->default(false),
                    Fieldset::make('Submission')
                        ->relationship('submission')
                        ->schema([
                            TextInput::make('phone'),
                            Textarea::make('comment'),
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                CheckboxColumn::make('sleep')
                    ->label('Dort')
                    ->sortable(),
                TextColumn::make('allergies')
                    ->limit(30),

                // Include submission data
                TextColumn::make('submission.comment')
                    ->label('Commentaire')
                    ->limit(30),
                TextColumn::make('submission.phone')
                    ->label('Téléphone'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make()
                    ->label(''),
                EditAction::make()
                    ->label(''),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->paginated(50);
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
