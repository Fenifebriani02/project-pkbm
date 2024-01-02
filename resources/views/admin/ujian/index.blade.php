<x-layout.admin.app>
    <section class="content-body-header">
        <h2>DATA UJIAN</h2>
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
                                <x-table.th title="Kelas" />
                                <x-table.th title="Mata Pelajaran" />
                                <x-table.th title="Ujian" />
                                <x-table.th title="Keterangan" />
                                <x-table.th title="Aksi" />
                            </tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <x-table.td value="{{ $loop->iteration }}" />
                                    <x-table.td value="{{ $item->mapel->kelas->nama_kelas }}" />
                                    <x-table.td value="{{ $item->mapel->mapel }}" />
                                    <x-table.td value="{{ $item->nama_ujian }}" />
                                    <td>
                                        <center>
                                            @if ($item->selisihTanggal() == 'Ujian sudah berakhir')
                                                <span class="text-danger">{{ $item->selisihTanggal() }}</span>
                                            @else
                                                {{ $item->selisihTanggal() }}
                                            @endif
                                        </center>
                                    </td>
                                    <x-table.td-action>
                                        <x-button.btn class="warning" icons icon="mdi-eye"
                                            url="{{ url('admin/ujian/detail', $item->id) }}" />
                                            <x-button.btn class="danger" icons icon="mdi-delete" modal
                                            url="#hapus{{ $item->id }}" />
                                    </x-table.td-action>
                                </tr>
                                <!--- Modal hapus --->
                                <x-modal.modal-delete id="hapus{{ $item->id }}"
                                    action="{{ url('admin/ujian/delete', $item->id) }}" />
                                <!--- #Modal hapus --->
                            @endforeach
                        </x-table.tbody>
                    </x-table.table>
                </x-card.body>
            </x-card.card>
        </div>
    </div>



    <!--- Modal tambah --->
    <x-modal.modal id="tambah" title="TAMBAH DATA UJIAN" action="{{ url('admin/ujian/tambah') }}">
        <div class="row">
            <div class="col-md-12">

                <input type="hidden" name="mapel_id" id="mapel_id">
                <x-dropdown.dropdown>
                    <x-input.input label="Mata pelajaran" placeholder="Pilih mata pelajaran ..." inputdropdown
                        id="xx" disabled />
                    <x-dropdown.content>
                        @foreach ($mapel as $item)
                            <x-dropdown.items id="{{ $item->id }}" dataid="{{ $item->mapel }}">
                                <x-dropdown.list-items title="Mapel" value="{{ $item->mapel }}" />
                                <x-dropdown.list-items title="Kelas" value="{{ $item->kelas->nama_kelas }}" />
                            </x-dropdown.items>
                        @endforeach
                    </x-dropdown.content>
                </x-dropdown.dropdown>
                <x-input.input label="Nama Ujian" name="nama_ujian" placeholder="Masukan nama ujian ..." />
                <x-input.input label="Tenggat" name="tenggat" disabled id="datetimepicker"
                    placeholder="Masukan tenggat ..." />
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

    <script>
        $(document).ready(function() {

            const btns = $('.btn-dropdown');

            $('.btns').on('click', function() {
                const $this = $(this);
                const id = $this.attr('id');
                const dataId = $this.attr('data-id');
                const classId = $this.attr('class');
                const isi = btns[0];
                const inp = btns[0];

                $('#mapel_id').val(id);
                $('#xx').val(dataId);
                isi.innerHTML = dataId;
            });
        })
    </script>
</x-layout.admin.app>
