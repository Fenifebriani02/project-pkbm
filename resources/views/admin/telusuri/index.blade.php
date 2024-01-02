<x-layout.admin.app>

    <section class="content-body-header">
        <h2>DATA TELUSURI</h2>
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
                                <x-table.th title="Judul" />
                                <x-table.th title="Link" />
                                <x-table.th title="Aksi" />
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>

                            @foreach ($list as $item)
                                <tr>
                                    <x-table.td value="{{ $loop->iteration }}" />
                                    <x-table.td value="{{ $item->judul }}" />
                                    <x-table.td value="{{ $item->link }}" />
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
                                    action="{{ url('admin/telusuri/delete', $item->id) }}" />
                                <!--- #Modal hapus --->
                                <!--- Modal edit --->
                                <x-modal.modal id="edit{{ $item->id }}" title="EDIT DATA TELUSURI"
                                    action="{{ url('admin/telusuri/edit', $item->id) }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <x-input.input label="Judul" name="judul" value="{{ $item->judul }}"
                                                placeholder="Masukan judul ..." />
                                            <x-input.input label="Link" name="link" value="{{ $item->link }}"
                                                placeholder="Masukan materi ..." />
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
                                <x-modal.modal modalDialog="modal-xl" id="detail{{ $item->id }}"
                                    title="DETAIL TELUSURI">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <iframe width="100%" height="400"
                                                src="https://www.youtube.com/embed/{{ $item->link }}"
                                                title="YouTube video player" frameborder="0" allowfullscreen></iframe>
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
    <x-modal.modal id="tambah" title="TAMBAH DATA TELUSURI" action="{{ url('admin/telusuri/tambah') }}">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Judul" name="judul" placeholder="Masukan judul ..." />
                <x-input.input label="Link" name="link" placeholder="Masukan materi ..." />

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
