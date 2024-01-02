<x-layout.admin.app>

    <section class="content-body-header">
        <h2>DATA MATA PELAJARAN SISWA</h2>
    </section>
    <div class="row">
        <div class="col-md-6">
            <x-card.card>
                <x-card.body>
                    <table class="table">
                        <tr>
                            <th>NAMA KELAS</th>
                            <td>:</td>
                            <td>{{ $list->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <th>GURU KELAS</th>
                            <td>:</td>
                            <td>{{ $list->guru->nama }}</td>
                        </tr>
                    </table>
                </x-card.body>
            </x-card.card>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-card.card>
                <x-card.header>
                    <x-button.btn url="#tambah" modal class="success float-end" label="Tambah data" />
                </x-card.header>
                <x-card.body>
                    <x-table.table>
                        <x-table.thead>
                            <tr>
                                <x-table.th title="No." />
                                <x-table.th title="Mata Pelajaran" />
                                <x-table.th title="Materi" />
                                <x-table.th title="Deskripsi" />
                                <x-table.th title="Aksi" />
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>

                            @foreach ($list->mapel as $item)
                                <tr>
                                    <x-table.td value="{{ $loop->iteration }}" />
                                    <x-table.td value="{{ $item->mapel }}" />
                                    <x-table.td value="{{ $item->materi }}" />
                                    <x-table.td value="{{ $item->deskripsi }}" />
                                    <x-table.td-action>
                                        {{-- <x-button.btn class="warning" icons icon="mdi-eye"
                                            url="#detail{{ $item->id }}" modal /> --}}
                                        <x-button.btn class="primary" icons icon="mdi-pencil" modal
                                            url="#edit{{ $item->id }}" />
                                        <x-button.btn class="danger" icons icon="mdi-delete" modal
                                            url="#hapus{{ $item->id }}" />
                                    </x-table.td-action>
                                </tr>
                                <!--- Modal hapus --->
                                <x-modal.modal-delete id="hapus{{ $item->id }}"
                                    action="{{ url('admin/mapel/delete', $item->id) }}" />
                                <!--- #Modal hapus --->

                                <!--- Modal edit --->
                                <x-modal.modal id="edit{{ $item->id }}" title="EDIT DATA MAPEL"
                                    action="{{ url('admin/mapel/update', $list->id) }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <x-input.input label="Nama Mata Pelajaran" name="mapel"
                                                value="{{ $item->mapel }}"
                                                placeholder="Masukan nama mata pelajaran ..." />
                                            <x-input.input label="Materi" name="materi" value="{{ $item->materi }}"
                                                placeholder="Masukan materi ..." />
                                            <x-input.input label="Deskripsi" name="deskripsi"
                                                value="{{ $item->deskripsi }}" placeholder="Masukan deskripsi ..." />

                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                            </div>
                                        </div>
                                    </div>
                                </x-modal.modal>
                                <!--- #Modal edit --->

                                <!--- Modal detail --->
                                {{-- <x-modal.modal id="detail{{ $item->id }}" title="DETAIL SISWA">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="ul-detail">
                                                <x-list.li-horizontal left="NIM" right="{{ $item->nim }}" />
                                                <x-list.li-horizontal left="Nama" right="{{ $item->nama }}" />
                                                <x-list.li-horizontal left="Jenis Kelamin"
                                                    right="{{ $item->jenis_kelamin }}" />
                                                <x-list.li-horizontal left="Tanggal Lahir"
                                                    right="{{ $item->tanggal_lahir }}" />
                                                <x-list.li-horizontal left="Telepon" right="{{ $item->no_hp }}" />
                                                <x-list.li-horizontal left="Alamat" right="{{ $item->alamat }}" />
                                                <x-list.li-horizontal left="Username" right="{{ $item->username }}" />
                                                <x-list.li-horizontal left="Email" right="{{ $item->email }}" />
                                            </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center justify-content-end mt-3">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">TUTUP</button>
                                            </div>
                                        </div>
                                    </div>
                                </x-modal.modal> --}}
                                <!--- #Modal detail --->
                            @endforeach



                        </x-table.tbody>
                    </x-table.table>
                </x-card.body>
            </x-card.card>
        </div>
    </div>

    <!--- Modal tambah --->
    <x-modal.modal id="tambah" title="TAMBAH DATA MAPEL" action="{{ url('admin/mapel/tambah', $list->id) }}">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Nama Mata Pelajaran" name="mapel"
                    placeholder="Masukan nama mata pelajaran ..." />
                <x-input.input label="Materi" name="materi" placeholder="Masukan materi ..." />
                <x-input.input label="Deskripsi" name="deskripsi" placeholder="Masukan deskripsi ..." />

            </div>
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </div>
        </div>
    </x-modal.modal>
    <!--- #Modal tambah --->
    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#tambah').modal('show');
            })
        </script>
    @endif

</x-layout.admin.app>
