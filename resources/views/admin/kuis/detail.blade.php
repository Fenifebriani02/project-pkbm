<x-layout.admin.app>

    <section class="content-body-header">
        <h2>DETAIL DATA KUIS</h2>
    </section>
    <div class="row">
        <div class="col-md-12">
            <x-card.card>
                <x-card.body>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="ul-detail">
                                <x-list.li-horizontal left="GURU" right="{{ $list->mapel->kelas->guru->nama }}" />
                                <x-list.li-horizontal left="KELAS" right="{{ $list->mapel->kelas->nama_kelas }}" />
                                <x-list.li-horizontal left="MATA PELAJARAN" right="{{ $list->mapel->mapel }}" />
                                <x-list.li-horizontal left="JUDUL KUIS" right="{{ $list->nama_kuis }}" />
                                <x-list.li-horizontal left="SOAL" right="{{ $list->soal_kuis }}" />
                                <x-list.li-horizontal left="TENGGAT" right="{{ $list->tenggat }}" />
                                <x-list.li-horizontal left="OPSI PILIHAN" />
                            </ul>
                            <ol type="A" style="padding: 0 24px">
                                <x-list.li-horizontal right="{{ $list->opsi_a }}" />
                                <x-list.li-horizontal right="{{ $list->opsi_b }}" />
                                <x-list.li-horizontal right="{{ $list->opsi_c }}" />
                                <x-list.li-horizontal right="{{ $list->opsi_d }}" />
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <ul class="ul-detail">
                                <x-list.li-horizontal left="KETERANGAN" right="{{ $list->selisihTanggal() }}"
                                    class="{{ $list->selisihTanggal() == 'Kuis sudah berakhir' ? 'text-danger' : '' }} " />
                                <x-list.li-horizontal left="DESKRIPSI" right="{{ $list->deskripsi }}" />
                                <x-list.li-horizontal left="KUNCI JAWABAN" right="{{ $list->kunci_jawaban }}" />
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <x-table.table>
                                <x-table.thead>
                                    <tr>
                                        <x-table.th title="No." />
                                        <x-table.th title="NIM" />
                                        <x-table.th title="NAMA" />
                                        <x-table.th title="JAWABAN" />
                                        <x-table.th title="NILAI" />
                                        <x-table.th title="AKSI" />
                                    </tr>
                                </x-table.thead>
                                <x-table.tbody>
                                    @foreach ($list->nilai as $item)
                                        <tr>
                                            <x-table.td value="{{ $loop->iteration }}" />
                                            <x-table.td value="{{ $item->siswa->nim }}" />
                                            <x-table.td value="{{ $item->siswa->nama }}" />
                                            <x-table.td value="{{ $item->jawaban }}" />
                                            <x-table.td value="{{ $item->nilai }}" />
                                            <x-table.td-action>
                                                <x-button.btn class="primary" icons icon="mdi-pencil" modal
                                                    url="#edit{{ $item->id }}" />
                                                <x-button.btn class="danger" icons icon="mdi-delete" modal
                                                    url="#hapus{{ $item->id }}" />
                                            </x-table.td-action>
                                        </tr>

                                        <!--- Modal hapus --->
                                        <x-modal.modal-delete id="hapus{{ $item->id }}"
                                            action="{{ url('admin/kuis/delete/nilai', $item->id) }}" />
                                        <!--- #Modal hapus --->

                                        <!--- Modal edit --->
                                        <x-modal.modal id="edit{{ $item->id }}" title="EDIT DATA JAWABAN SISWA"
                                            action="{{ url('admin/kuis/update/nilai', $item->id) }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <x-input.input label="Jawaban" value="{{ $item->jawaban }}"
                                                        name="jawaban" placeholder="Masukan username ..." />
                                                </div>
                                                <div class="col-md-12">
                                                    <x-input.input label="Nilai" value="{{ $item->nilai }}"
                                                        name="nilai" placeholder="Masukan nilai ..." />
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">BATAL</button>
                                                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </x-modal.modal>
                                        <!--- #Modal edit --->
                                    @endforeach
                                </x-table.tbody>
                            </x-table.table>
                        </div>

                    </div>
                </x-card.body>
            </x-card.card>
        </div>
    </div>



</x-layout.admin.app>
