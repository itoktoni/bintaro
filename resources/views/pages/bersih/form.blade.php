<x-layout>
    <x-form :model="$model">
        <x-card>
            <x-action form="form" />

            <div class="row">
                @bind($model)
                    
                <x-form-input col="6" name="bersih_id" />
                <x-form-input col="6" name="bersih_rfid" />
                <x-form-input col="6" name="bersih_id_ruangan" />
                <x-form-input col="6" name="bersih_id_jenis" />
                <x-form-input col="6" name="bersih_date" />

                @endbind
            </div>

        </x-card>
    </x-form>
</x-layout>
