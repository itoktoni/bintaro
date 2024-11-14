<x-layout>

    <x-card class="table-container">

        <div class="col-md-12">

            <x-form method="GET" x-init="" x-target="table" role="search" aria-label="Contacts"
                autocomplete="off" action="{{ moduleRoute('getTable') }}">

                <div class="row">
                    <div class=" form-group col-md-4 ">

                        <div class="input-group">

                            <span class="input-group-text">
                                RFID
                            </span>

                            <input class="form-control" type="text" value="{{ request()->get('detail_rfid') }}" name="detail_rfid">

                        </div>

                    </div>

                    <div class=" form-group col-md-4 ">

                        <div class="input-group">

                            <span class="input-group-text">
                                Lokasi
                            </span>

                            <select class="form-control" name="detail_id_ruangan">
                                <option value="">- Pilih Ruangan - </option>
                                @foreach ($ruangan as $loc)
                                    <option value="{{ $loc->field_primary }}">{{ $loc->field_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class=" form-group col-md-4 ">

                        <div class="input-group">

                            <span class="input-group-text">
                                Jenis
                            </span>

                            <select class="form-control" name="detail_id_jenis">
                                <option value="">- Pilih Jenis - </option>
                                @foreach ($jenis as $name)
                                    <option value="{{ $name->field_primary }}">{{ $name->field_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>

                <x-filter toggle="Filter" :hide="true" :fields="$fields"/>

            </x-form>

            <x-form method="POST" action="{{ moduleRoute('getTable') }}">

                <x-action form="disable"/>

                <div class="container-fluid" id="table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center column-action">{{ __('Action') }}</th>
                                    @foreach ($fields as $value)
                                        <th {{ Template::extractColumn($value) }}>
                                            @if ($value->sort)
                                                @sortablelink($value->code, __($value->name))
                                            @else
                                                {{ __($value->name) }}
                                            @endif
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $table)
                                    <tr>
                                        <td class="col-md-2 text-center column-action">
                                            <x-crud :model="$table" :action="['update']" />
                                        </td>

                                        <td>{{ $table->detail_rfid }}</td>
                                        <td>{{ $jenis[$table->detail_id_jenis]->jenis_nama ?? '' }}</td>
                                        <td>{{ $ruangan[$table->detail_id_ruangan]->ruangan_nama ?? '' }}</td>
                                        <td>{{ $table->detail_status_linen }}</td>
                                        <td>{{ $table->detail_updated_at }}</td>

                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :data="$data" />
                </div>

            </x-form>

        </div>

    </x-card>

</x-layout>
