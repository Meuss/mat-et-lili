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
                style="background-image: url('/images/placeholder.jpg'); background-size: cover; background-position: center; background-attachment: fixed;"
            >
                <h1 class="text-5xl">Lisianne & Mathieu</h1>
                <p class="text-3xl">21 Juin 2025</p>
            </section>
            <div class="container">
                <section class="min-h-40 py-10">
                    <h3 class="text-xl font-bold mb-4">La cérémonie de mariage</h3>
                    <p>Château de Gruyères<br>Route de Gruyères 3, 1630 Gruyères</p>
                    <p>Samedi 21 Juin 2025<br>14h00</p>
                </section>
                <section class="min-h-40 py-10">
                    <h3 class="text-xl font-bold mb-4">L'apéritif</h3>
                    <p>Nous serons ravis de vous accueillir pour l'apéritif dès 17h30, au magnifique jardin du Domaine de l'Orangerie. Ce moment convivial sera l'occasion de trinquer ensemble et de partager des douceurs avant de passer à la suite des festivités.</p>
                </section>
                <section class="min-h-40 py-10">
                    <h3 class="text-xl font-bold mb-4">Le souper</h3>
                    <p>Nous vous invitons à nous rejoindre au <a class="underline" target="_blank" href="https://www.google.com/maps/place/Z%C3%BCrcher+Sch%C3%BClerheim/@46.6189859,7.1757124,373m/data=!3m1!1e3!4m6!3m5!1s0x478e60135fbb5999:0x897233720b76b6d8!8m2!3d46.6186428!4d7.176801!16s%2Fg%2F1tppqwfq?entry=ttu&g_ep=EgoyMDI0MTAxNi4wIKXMDSoASAFQAw%3D%3D">Zürcher Gruppenhaus à Charmey</a> pour un délicieux souper. La soirée commencera à 19h30 dans ce cadre chaleureux et montagnard, où vous pourrez déguster un repas spécialement préparé pour l’occasion. Nous avons hâte de partager ce moment festif avec vous dans cette ambiance conviviale !</p>
                </section>
                <section class="min-h-40 py-10">
                    <h3 class="text-xl font-bold mb-4">Nuitée sur place</h3>
                    <p>Comme nous savons que la fête sera arrosée, nous avons prévu la possibilité de dormir sur place. Le tarif est de 35 CHF par personne. N'hésitez pas à vous inscrire à l'avance pour garantir votre place et profiter d'une nuit tranquille après les festivités !</p>
                </section>
                <section class="max-w-2xl w-full p-6 bg-white rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] mx-auto">
                    <livewire:guest-submission-form />
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
