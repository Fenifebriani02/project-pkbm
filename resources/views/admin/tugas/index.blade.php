<x-layout.admin.app>

    <section class="content-body-header">
        <h2>DATA TUGAS</h2>
    </section>

    <div class="row">
        <div class="col-md-12">
            <x-card.card>
                <x-card.header>
                    <x-button.btn url="{{ url('admin/tugas/tambah') }}" class="success float-end" label="Tambah data" />
                </x-card.header>
                <x-card.body>
                    <x-table.table>
                        <x-table.thead>
                            <tr>
                                <x-table.th title="No." />
                                <x-table.th title="Mata Pelajaran" />
                                <x-table.th title="Kelas" />
                                <x-table.th title="Soal" />
                                <x-table.th title="Keterangan" />
                                <x-table.th title="Aksi" />
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <x-table.td value="{{ $loop->iteration }}" />
                                    <x-table.td value="{{ $item->mapel->mapel }}" />
                                    <x-table.td value="{{ $item->mapel->kelas->nama_kelas }}" />
                                    <x-table.td value="{{ $item->soal_tugas }}" />
                                    <td>
                                        <center>
                                            @if ($item->selisihTanggal() == 'Tugas sudah berakhir')
                                                <span class="text-danger">{{ $item->selisihTanggal() }}</span>
                                            @else
                                                {{ $item->selisihTanggal() }}
                                            @endif
                                        </center>
                                    </td>

                                    <x-table.td-action>
                                        <x-button.btn class="warning" icons icon="mdi-eye"
                                            url="{{ url('admin/tugas/detail', $item->id) }}" />
                                        <x-button.btn class="primary" icons icon="mdi-pencil"
                                            url="{{ url('admin/tugas/update', $item->id) }}" />
                                        <x-button.btn class="danger" icons icon="mdi-delete" modal
                                            url="#hapus{{ $item->id }}" />
                                    </x-table.td-action>
                                </tr>

                                <!--- Modal hapus --->
                                <x-modal.modal-delete id="hapus{{ $item->id }}"
                                    action="{{ url('admin/tugas/delete', $item->id) }}" />
                                <!--- #Modal hapus --->
                            @endforeach
                        </x-table.tbody>
                    </x-table.table>
                </x-card.body>
            </x-card.card>
        </div>
    </div>



</x-layout.admin.app>
