<x-layout.admin.app>

    <section class="content-body-header">
        <h2>FORM UPDATE KUIS</h2>
    </section>

    <div class="row">
        <div class="col-md-12">
            <x-card.card>
                <x-card.header>
                    <form action="{{ url('admin/kuis/update', $list->id) }}" method="POST" class="pt-3">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="mapel_id" value="{{ $list->mapel_id }}" id="mapel_id">
                            <div class="col-md-4">
                                <x-dropdown.dropdown>
                                    <x-input.input label="Mata pelajaran" value="{{ $list->mapel->mapel }}"
                                        placeholder="Pilih mata pelajaran ..." inputdropdown id="xx" disabled />
                                    <x-dropdown.content>
                                        @foreach ($mapel as $item)
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
                                <x-input.input label="Nama Kuis" name="nama_kuis" value="{{ $list->nama_kuis }}"
                                    placeholder="Masukan nama kuis ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input label="Soal Kuis" name="soal_kuis" value="{{ $list->soal_kuis }}"
                                    placeholder="Masukan soal kuis ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan A" name="opsi_a" value="{{ $list->opsi_a }}"
                                    placeholder="Masukan pilihan A ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan B" name="opsi_b" value="{{ $list->opsi_b }}"
                                    placeholder="Masukan pilihan B ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan C" name="opsi_c" value="{{ $list->opsi_c }}"
                                    placeholder="Masukan pilihan C ..." />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Pilihan D" name="opsi_d" value="{{ $list->opsi_d }}"
                                    placeholder="Masukan pilihan D ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input label="Kuci Jawaban" name="kunci_jawaban"
                                    value="{{ $list->kunci_jawaban }}" placeholder="Masukan kunci jawaban ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input type="text" disabled id="datetimepicker" label="Tenggat"
                                    value="{{ $list->tenggat }}" name="tenggat"
                                    placeholder="Masukan kunci jawaban ..." />
                            </div>
                            <div class="col-md-4">
                                <x-input.input label="Deskripsi" name="deskripsi" value="{{ $list->deskripsi }}"
                                    placeholder="Masukan deskripsi kuis ..." />
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="{{ url('admin/kuis') }}" class="btn btn-outline-secondary">KEMBALI</a>
                                    <button class="btn btn-outline-primary">UPDATE</button>
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
</x-layout.admin.app>
