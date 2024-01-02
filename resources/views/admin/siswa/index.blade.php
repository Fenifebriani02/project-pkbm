<x-layout.admin.app>

    <section class="content-body-header">
        <h2>DATA KELAS SISWA</h2>
    </section>
    <div class="row">
        <div class="col-md-6">
            <x-card.card>
                <x-card.body>
                    <table class="table">
                        <tr>
                            <th>NAMA KELAS</th>
                            <td>:</td>
                            <td>{{ $list[0]->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <th>GURU KELAS</th>
                            <td>:</td>
                            <td>{{ $list[0]->guru->nama }}</td>
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
                                <x-table.th title="NIM" />
                                <x-table.th title="Nama" />
                                <x-table.th title="Jenis Kelamin" />
                                <x-table.th title="No.HP" />
                                <x-table.th title="Aksi" />
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>

                            @foreach ($list[0]->siswa as $item)
                                <tr>
                                    <x-table.td value="{{ $loop->iteration }}" />
                                    <x-table.td value="{{ $item->nim }}" />
                                    <x-table.td value="{{ $item->nama }}" />
                                    <x-table.td value="{{ $item->jenis_kelamin }}" />
                                    <x-table.td value="{{ $item->no_hp }}" />
                                    <x-table.td-action>
                                        <x-button.btn class="warning" icons icon="mdi-eye"
                                            url="#detail{{ $item->id }}" modal />
                                        <x-button.btn class="primary" icons icon="mdi-pencil" modal
                                            url="#edit{{ $item->id }}" />
                                        <x-button.btn class="danger" icons icon="mdi-delete" modal
                                            url="#hapus{{ $item->id }}" />
                                    </x-table.td-action>
                                </tr>
                                <!--- Modal hapus --->
                                <x-modal.modal-delete id="hapus{{ $item->id }}"
                                    action="{{ url('admin/siswa/delete', $item->id) }}" />
                                <!--- #Modal hapus --->

                                <!--- Modal edit --->
                                <x-modal.modal id="edit{{ $item->id }}" title="EDIT DATA SISWA"
                                    action="{{ url('admin/siswa/update', $item->id) }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <x-input.input label="Username" value="{{ $item->username }}"
                                                name="username" placeholder="Masukan username ..." />
                                            <x-input.input label="Nama" name="nama" value="{{ $item->nama }}"
                                                placeholder="Masukan nama ..." />
                                            <x-input.input label="NIM" name="nim" value="{{ $item->nim }}"
                                                placeholder="Masukan NIM ..." />
                                            <x-input.input label="No.HP" name="no_hp" value="{{ $item->no_hp }}"
                                                placeholder="Masukan nomor hp ..." />
                                            <x-input.select label="Jenis Kelamin" name="jenis_kelamin">
                                                <option value="Laki-laki"
                                                    @if ($item->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                                <option value="Perempuan"
                                                    @if ($item->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                            </x-input.select>
                                            <x-input.input label="Alamat" name="alamat" value="{{ $item->alamat }}"
                                                placeholder="Masukan alamat ..." />
                                            <x-input.input label="Email" name="email" value="{{ $item->email }}"
                                                placeholder="Masukan email ..." />
                                            <x-input.input label="Password" name="password"
                                                placeholder="Masukan password ..." />
                                            <x-input.input type="date" label="Tanggal Lahir" name="tanggal_lahir"
                                                value="{{ $item->tanggal_lahir }}"
                                                placeholder="Masukan tanggal lahir ..." />
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

                                <!--- Modal detail --->
                                <x-modal.modal id="detail{{ $item->id }}" title="DETAIL SISWA">
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
                                </x-modal.modal>
                                <!--- #Modal detail --->
                            @endforeach



                        </x-table.tbody>
                    </x-table.table>
                </x-card.body>
            </x-card.card>
        </div>
    </div>

    <!--- Modal tambah --->
    <x-modal.modal id="tambah" title="TAMBAH DATA SISWA" action="{{ url('admin/siswa/tambah', $list[0]->id) }}">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Username" name="username" placeholder="Masukan username ..." />
                <x-input.input label="Nama" name="nama" placeholder="Masukan nama ..." />
                <x-input.input label="NIM" name="nim" placeholder="Masukan NIM ..." />
                <x-input.input label="No.HP" name="no_hp" placeholder="Masukan nomor hp ..." />
                <x-input.select label="Jenis Kelamin" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </x-input.select>
                <x-input.input label="Alamat" name="alamat" placeholder="Masukan alamat ..." />
                <x-input.input label="Email" name="email" placeholder="Masukan email ..." />
                <x-input.input label="Password" name="password" placeholder="Masukan password ..." />
                <x-input.input type="date" label="Tanggal Lahir" name="tanggal_lahir"
                    placeholder="Masukan tanggal lahir ..." />
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
