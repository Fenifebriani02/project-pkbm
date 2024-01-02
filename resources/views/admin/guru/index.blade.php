<x-layout.admin.app>
    <section class="content-body-header">
        <h2>DATA GURU</h2>
    </section>
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
                                <x-table.th title="NIP" />
                                <x-table.th title="Nama" />
                                <x-table.th title="Jenis Kelamin" />
                                <x-table.th title="Alamat" />
                                <x-table.th title="Aksi" />
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <x-table.td value="{{ $loop->iteration }}" />
                                    <x-table.td value="{{ $item->nip }}" />
                                    <x-table.td value="{{ $item->nama }}" />
                                    <x-table.td value="{{ $item->jenis_kelamin }}" />
                                    <x-table.td value="{{ $item->alamat }}" />
                                    <x-table.td-action>
                                        <x-button.btn class="primary" icons icon="mdi-pencil" modal url="#edit{{ $item->id }}" />
                                        <x-button.btn class="danger" icons icon="mdi-delete" modal url="#hapus{{ $item->id }}" />
                                    </x-table.td-action>
                                </tr>

                                <!--- Modal hapus --->
                                <x-modal.modal-delete id="hapus{{ $item->id }}" action="{{ url('admin/guru/delete', $item->id) }}" />
                                <!--- #Modal hapus --->

                                <!--- Modal edit --->
                                <x-modal.modal id="edit{{ $item->id }}" title="UPDATE DATA GURU" action="{{ url('admin/guru/update', $item->id) }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <x-input.input label="NIP" name="nip" value="{{ $item->nip }}" placeholder="Masukan NIP ..." />
                                            <x-input.input label="Nama" name="nama" value="{{ $item->nama }}"  placeholder="Masukan nama ..." />
                                            <x-input.select label="Jenis Kelamin" name="jenis_kelamin">
                                                <option value="Laki-laki" @if ($item->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                                <option value="Perempuan" @if ($item->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                            </x-input.select>
                                            <x-input.input label="Username" name="username" value="{{ $item->username }}" placeholder="Masukan username ..." />
                                            <x-input.input label="Password" name="password" placeholder="Masukan password ..." />
                                            <x-input.input label="Alamat" name="alamat" value="{{ $item->alamat }}" placeholder="Masukan alamat ..." />
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
                               
                            @endforeach
                        </x-table.tbody>
                    </x-table.table>
                </x-card.body>
            </x-card.card>
        </div>
    </div>

     <!--- Modal tambah --->
     <x-modal.modal id="tambah" title="TAMBAH DATA GURU" action="{{ url('admin/guru/tambah') }}">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="NIP" name="nip" placeholder="Masukan NIP ..." />
                <x-input.input label="Nama" name="nama"  placeholder="Masukan nama ..." />
                <x-input.select label="Jenis Kelamin" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </x-input.select>
                <x-input.input label="Username" name="username" placeholder="Masukan username ..." />
                <x-input.input label="Password" name="password" placeholder="Masukan password ..." />
                <x-input.input label="Alamat" name="alamat" placeholder="Masukan alamat ..." />
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
