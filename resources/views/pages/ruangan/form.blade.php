<x-layout>
    <x-form :model="$model">
        <x-card>
            <x-action form="form" />

            <div class="row">
                @bind($model)

                <x-form-input col="6" name="ruangan_id" />
                <x-form-input col="6" name="ruangan_nama" />

                @endbind
            </div>

        </x-card>
    </x-form>
</x-layout>
