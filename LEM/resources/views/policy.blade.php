<x-guest-layout>
    <div class="pt-4 bg-custom"> <!-- Classe personalizada para o fundo do layout -->
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 bg-form-custom prose"> <!-- Classe personalizada para o fundo do formulário -->
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout>
