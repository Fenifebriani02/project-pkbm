<x-layout.siswa.app>

    @if ($list->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <x-card.card>
                    <x-card.header>
                        <h2>Jawablah ujian dibawah ini, yang menurut anda paling benar !</h2>
                    </x-card.header>
                    <x-card.body>
                        <form action="{{ url('siswa/ujian/kirimjawaban') }}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <ol type="1">
                                        @foreach ($list as $item)
                                            @if ($item->soalujian->count() > 0)
                                                <ol type="1">
                                                    @foreach ($item->soalujian as $soalujian)
                                                        <input type="hidden" name="ujian_id[]"
                                                            value="{{ $soalujian->ujian_id }}">
                                                        <input type="hidden" name="kunci_jawaban[]"
                                                            value="{{ $soalujian->kunci_jawaban }}">
                                                        <li>
                                                            <span>{{ $soalujian->soal }}</span>
                                                            <ol type="A">
                                                                <li>
                                                                    <x-input.checkbox name="jawaban[]"
                                                                        value="{{ $soalujian->opsi_a }}"
                                                                        label="{{ $soalujian->opsi_a }}" />
                                                                </li>
                                                                <li>
                                                                    <x-input.checkbox name="jawaban[]"
                                                                        value="{{ $soalujian->opsi_b }}"
                                                                        label="{{ $soalujian->opsi_b }}" />
                                                                </li>
                                                                <li>
                                                                    <x-input.checkbox name="jawaban[]"
                                                                        value="{{ $soalujian->opsi_c }}"
                                                                        label="{{ $soalujian->opsi_c }}" />
                                                                </li>
                                                                <li>
                                                                    <x-input.checkbox name="jawaban[]"
                                                                        value="{{ $soalujian->opsi_d }}"
                                                                        label="{{ $soalujian->opsi_d }}" />
                                                                </li>
                                                            </ol>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        @endforeach

                                    </ol>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <button class="btn btn-outline-primary">KIRIM JAWABAN</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </x-card.body>
                </x-card.card>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <x-card.card>
                    <x-card.header>
                        <h2 class="text-center">Belum ada ujian untuk ditampilkan</h2>
                    </x-card.header>
                </x-card.card>
            </div>
        </div>
    @endif


</x-layout.siswa.app>
