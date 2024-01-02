<x-layout.admin.app>

    <section class="content-body-header mb-5">
        <h2>DETAIL DATA UJIAN</h2>
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
                                <x-list.li-horizontal left="TENGGAT" right="{{ $list->tenggat }}" />


                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="ul-detail">
                                <x-list.li-horizontal left="UJIAN" right="{{ $list->nama_ujian }}" />
                                <x-list.li-horizontal left="KETERANGAN" right="{{ $list->selisihTanggal() }}"
                                    class="{{ $list->selisihTanggal() == 'Ujian sudah berakhir' ? 'text-danger' : '' }} " />
                                <x-list.li-horizontal left="DESKRIPSI" right="{{ $list->deskripsi }}" />

                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-end mt-3 gap-1">
                                <x-button.btn class="secondary" modal label="Lihat Nilai Siswa" url="#lihatnilai" />
                                <x-button.btn class="success" modal icons icon="mdi-microsoft-office"
                                    label="Upload Soal Ujian" url="#uploadsoal" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <x-table.table>
                                <x-table.thead>
                                    <tr>
                                        <x-table.th />
                                        <x-table.th title="No." />
                                        <x-table.th title="Soal" />
                                        <x-table.th title="Kunci Jawaban" />
                                        <x-table.th title="Aksi" />
                                    </tr>
                                </x-table.thead>
                                <x-table.tbody>

                                    @foreach ($list->soalujian as $item)
                                        <tr>
                                            <x-table.td-checkbox value="{{ $item->id }}" />
                                            <x-table.td value="{{ $loop->iteration }}" />
                                            <x-table.td value="{{ $item->soal }}" />
                                            <x-table.td value="{{ $item->kunci_jawaban }}" />
                                            <x-table.td-action>
                                                <x-button.btn class="warning" modal icons icon="mdi-eye"
                                                    url="#detail{{ $item->id }}" />
                                            </x-table.td-action>
                                        </tr>
                                        <!--- Modal Detail --->
                                        <x-modal.modal id="detail{{ $item->id }}" title="DETAIL SOAL UJIAN"
                                            modalDialog="modal-xl">
                                            <div class="row">
                                                <div class="col-md-12">


                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">TUTUP</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </x-modal.modal>
                                        <!--- #Modal detail --->
                                    @endforeach
                                </x-table.tbody>

                            </x-table.table>
                        </div>
                    </div>
                    <div class="row col-md-4">
                        <form action="{{ url('admin/ujian/hapusMasal') }}" method="POST">
                            @csrf
                            <input type="text" name="id[]" class="inputs">
                            <table class="table">
                                <tr>
                                    <th>Dipilih</th>
                                    <td>:</td>
                                    <td class="tampil-dipilih">0</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-danger">HAPUS</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </x-card.body>
            </x-card.card>
        </div>
    </div>

    <!--- Modal Detail --->
    <x-modal.modal id="lihatnilai" action="{{ url('admin/uploadSoalUjian') }}" title="NILAI UJIAN SISWA"
        modalDialog="modal-xl">
        <div class="row">
            <div class="col-md-12">


            </div>
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </div>
        </div>
    </x-modal.modal>
    <!--- #Modal detail --->

    <!--- Modal upload soal --->
    <x-modal.modal id="uploadsoal" action="{{ url('admin/ujian/uploadSoalUjian') }}" title="UPLOAD SOAL UJIAN">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="ujian_id" value="{{ $list->id }}" />
                <x-input.input type="file" label="Upload File Soal" name="file" placeholder="Masukan file ..." />

            </div>
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-primary">UPLOAD</button>
                </div>
            </div>
        </div>
    </x-modal.modal>
    <!--- #Modal uploadsoal --->
    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var dipilih = 0;
            var nilaiCheckboxDicentang = "";
            $('.table tbody').on('click', 'tr td .form-check-input', function() {

                var isChecked = $(this).prop('checked');
                var checkboxValue = $(this).val();


                if (isChecked) {
                    var isiCheckbox = $(this).val();
                    nilaiCheckboxDicentang += checkboxValue + ",";
                    dipilih++;
                } else {
                    console.log("Checkbox tidak dicentang.");
                    nilaiCheckboxDicentang = nilaiCheckboxDicentang.replace(checkboxValue + ",", "");
                    dipilih--;
                }
                $('.tampil-dipilih').html(dipilih);
                $('.inputs').val(nilaiCheckboxDicentang);
            });

        })
    </script>
</x-layout.admin.app>
