<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lisianne & Mathieu</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

        <!-- Styles -->
        @filamentStyles
        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-white flex flex-col items-center justify-center">
            <section
                class="h-[95vh] w-full flex flex-col items-center justify-center"
                style="background-image: url('/images/placeholder.jpg'); background-size: cover; background-position: center;"
            >
                <h1 class="text-5xl">Lisianne & Mathieu</h1>
                <p class="text-3xl">21 Juin 2025</p>
            </section>
            <div class="container">
                <section class="mt-10 lg:mt-20">
                    <h3 class="text-4xl font-bold mb-4">L'apéro de mariage</h3>
                    <p>Chères familles, chers amis,</p>
                    <div class="flex flex-col md:flex-row gap-2 mb-6">
                        <div>
                            <p>Nous nous réjouissons d’ores et déjà de partager cette journée avec vous tous! Et pour cela vous êtes conviés à notre apéro de mariage :</p>
                            <p>Rue du Bourg 53, 1663 Gruyères,
                                <a class="underline" href="https://www.google.com/maps/@46.5840786,7.0819497,3a,75y,27.05h,102.31t/data=!3m8!1e1!3m6!1sAF1QipMhO65BQ3yElmMuDVKI-o5G7UINM2KFVEfdHN4P!2e10!3e11!6s%2F%2Flh5.ggpht.com%2Fp%2FAF1QipMhO65BQ3yElmMuDVKI-o5G7UINM2KFVEfdHN4P%3Dw900-h600-k-no-pi-12.305071190333493-ya10.31866088959233-ro0-fo100!7i5760!8i2880?entry=ttu&g_ep=EgoyMDI0MTEwNi4wIKXMDSoASAFQAw%3D%3D" target="_blank">à côté du restaurant Le Chalet de Gruyères</a>
                                <svg class="ml-1 mb-1 size-3 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg> pour <strong>14h40</strong>.</p>
                            <p>Pensez à venir en avance en raison du lieu touristique ainsi qu’aux quelques minutes de marche du parking jusqu’au lieu de rencontre.</p>
                        </div>
                        <div>
                            <img src="{{ asset('images/chalet-suisse.jpg') }}" alt="Chalet Suisse">
                        </div>
                    </div>
                </section>
                <section class="mt-10 lg:mt-20">
                    <h3 class="text-4xl font-bold mb-4">Le souper</h3>
                    <p>Malgré le bonheur que susciterait la présence de nombreux enfants à notre mariage, nous regrettons que le lieu de réception pour le souper ne nous permette pas de les accueillir mais nous nous réjouissons de partager l’apéro de notre mariage avec eux !</p>
                    <p>La fête n’est pas finie! Alors suis-nous à notre souper de célébration qui aura lieu à la <a class="underline" target="_blank" href="https://www.google.com/maps/place/Z%C3%BCrcher+Sch%C3%BClerheim/@46.6189859,7.1757124,373m/data=!3m1!1e3!4m6!3m5!1s0x478e60135fbb5999:0x897233720b76b6d8!8m2!3d46.6186428!4d7.176801!16s%2Fg%2F1tppqwfq?entry=ttu&g_ep=EgoyMDI0MTAxNi4wIKXMDSoASAFQAw%3D%3D">Colonie de Zürich</a><svg class="ml-1 mb-1 size-3 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>, à Charmey : Route des Arses 60.</p>
                    <p>Pour toutes propositions farfelues telles qu’animations, jeux… veuillez-vous adresser auprès de notre major de table Richard Remy dit « Petzon » au 079 750 32 50 ou bien par email à
                        <a href="todo" target="_blank" class="underline text-red-400">richy@email</a><svg class="ml-1 mb-1 size-3 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>.</p>
                </section>
                <section class="mt-10 lg:mt-20">
                    <h3 class="text-4xl font-bold mb-4">Le repos</h3>
                    <p>Afin de partager avec nous ce festoiement jusqu’au bout de la nuit, tu as la possibilité de réserver une chambre pour deux au prix de 45.-/personne ou 35.-/personne pour une chambre de 4.</p>
                    <p>Au petit matin du dimanche, (sûrement très petit), un petit déjeuner sera servi de 8h-11h.</p>
                </section>
                <section class="mt-10 lg:mt-20 border-t-2 pt-5">
{{--                    <h3 class="text-4xl font-bold mb-4">Le formulaire</h3>--}}
                    <p>Afin de nous faciliter l'organisation, merci de remplir le formulaire ci-dessous, en y précisant vos particularités alimentaires (allergie, végétarien, …).</p>
                    <p class="text-red-400">Limitations chambres à deux? ou bien assez? Comment faire pour un solo?</p>
                    <div class="max-w-2xl w-full p-6 bg-white rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">
                        <livewire:guest-submission-form />
                    </div>
                </section>
                <section class="mt-10 lg:mt-20">
                    <h3 class="text-4xl font-bold mb-4">Les cadeaux</h3>
                    <p>Votre présence sera déjà le plus beau des cadeaux.</p>
                    <p>Si vous souhaitez participer à notre voyage de noce, une boîte à cartes sera à disposition sur place ou si vous le souhaitez voici nos coordonnées :</p>
                    <p>
                        Iban: CH29 0076 8300 1486 5650 3<br>
                        Mathieu Mauron & Lisianne Brunner<br>
                        Rue de Saletta 73, 1632 Riaz<br>
                        Banque cantonale de fribourg<br>
                    </p>
                </section>
                <section class="mt-10 text-xl text-center font-semibold">
                    <p>Nous nous réjouissons de vous voir nombreux et de vivre cette belle étape de notre vie à vos côtés.</p>
                    <p>On vous embrasse fort!</p>
                    <p>Mat & Lili</p>
                </section>
            </div>
            <footer class="w-full py-6 mt-10">
                <div class="container">
                    <div class="flex justify-between">
                        <p>Lisianne, 078 765 73 54</p>
                        <p>Mathieu, 078 848 14 53</p>
                    </div>
                </div>
            </footer>
        </div>

        @filamentScripts
        @livewireScripts
        @vite('resources/js/app.js')
    </body>
</html>
