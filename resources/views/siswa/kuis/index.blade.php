<x-layout.siswa.app>

    @if ($list->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <x-card.card>
                    <x-card.header>
                        <h2>Jawablah kuis dibawah ini, yang menurut anda paling benar !</h2>
                    </x-card.header>
                    <x-card.body>
                        <form action="{{ url('siswa/kuis/kirimjawaban') }}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <ol type="1">
                                        @foreach ($list as $item)
                                            <input type="hidden" name="kuis_id[]" value="{{ $item->id }}">
                                            <input type="hidden" name="kunci_jawaban[]"
                                                value="{{ $item->kunci_jawaban }}">
                                            <li>
                                                <span>{{ $item->soal_kuis }}</span>
                                                <ol type="A">
                                                    <li>
                                                        <div class="form-cehckbox">
                                                            <input type="checkbox" name="jawaban[]"
                                                                value=" {{ $item->opsi_a }}" class="checkbox">
                                                            <label for="">
                                                                {{ $item->opsi_a }}
                                                            </label>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-cehckbox">
                                                            <input type="checkbox" name="jawaban[]"
                                                                value=" {{ $item->opsi_b }}" class="checkbox">
                                                            <label for="">
                                                                {{ $item->opsi_b }}
                                                            </label>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-cehckbox">
                                                            <input type="checkbox" name="jawaban[]"
                                                                value=" {{ $item->opsi_c }}" class="checkbox">
                                                            <label for="">
                                                                {{ $item->opsi_c }}
                                                            </label>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-cehckbox">
                                                            <input type="checkbox" name="jawaban[]"
                                                                value=" {{ $item->opsi_d }}" class="checkbox">
                                                            <label for="">
                                                                {{ $item->opsi_d }}
                                                            </label>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
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
                        <h2 class="text-center">Belum ada kuis untuk ditampilkan</h2>
                    </x-card.header>
                </x-card.card>
            </div>
        </div>
    @endif


</x-layout.siswa.app>
