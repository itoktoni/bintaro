<x-layout>
    <x-form :model="$model">
        <x-card>
            <x-action form="form" />

            <div class="row">
                @bind($model)
                    
                <x-form-input col="6" name="detail_rfid" />
                <x-form-input col="6" name="detail_id_ruangan" />
                <x-form-input col="6" name="detail_id_jenis" />
                <x-form-input col="6" name="detail_status_linen" />
                <x-form-input col="6" name="detail_updated_at" />

                @endbind
            </div>

        </x-card>
    </x-form>
</x-layout>
