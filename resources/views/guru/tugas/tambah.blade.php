<x-layout.guru.app>

    <section class="content-body-header">
        <h2>BUAT DATA TUGAS</h2>
    </section>

    <div class="row">
        <div class="col-md-12">
            <x-card.card>
                <x-card.header>
                    <form action="{{ url('guru/tugas/tambah') }}" method="POST" class="pt-5">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="mapel_id" id="mapel_id">
                            <div class="col-md-4">
                                <x-dropdown.dropdown>
                                    <x-input.input label="Mata pelajaran" placeholder="Pilih mata pelajaran ..."
                                        inputdropdown id="xx" disabled />
                                    <x-dropdown.content>
                                        @foreach ($list as $item)
                                            <x-dropdown.items id="{{ $item->id }}" dataid="{{ $item->mapel }}">
                                                <x-dropdown.list-items title="Mapel" value="{{ $item->mapel }}" />
                                                <x-dropdown.list-items title="Kelas"
                                                    value="{{ $item->kelas->nama_kelas }}" />
                                            </x-dropdown.items>
                                        @endforeach
                                    </x-dropdown.content>
                                </x-dropdown.dropdown>
                            </div>
                            <div class="col-md-4">
                                <x-input.input label="Nama Tugas" name="nama_tugas"
                                    placeholder="Masukan nama kuis ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input label="Soal Tugas" name="soal_tugas"
                                    placeholder="Masukan soal tugas ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan A" name="opsi_a" placeholder="Masukan pilihan A ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan B" name="opsi_b" placeholder="Masukan pilihan B ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan C" name="opsi_c" placeholder="Masukan pilihan C ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan D" name="opsi_d" placeholder="Masukan pilihan D ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input label="Kuci Jawaban" name="kunci_jawaban"
                                    placeholder="Masukan kunci jawaban ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input type="text" disabled id="datetimepicker" label="Tenggat"
                                    name="tenggat" placeholder="Masukan kunci jawaban ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input label="Deskripsi" name="deskripsi"
                                    placeholder="Masukan deskripsi tugas ..." />
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="{{ url('guru/tugas') }}" class="btn btn-outline-secondary">KEMBALI</a>
                                    <button class="btn btn-outline-primary">SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card.header>
                <x-card.body>

                </x-card.body>
            </x-card.card>
        </div>
    </div>
    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
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
</x-layout.guru.app>
