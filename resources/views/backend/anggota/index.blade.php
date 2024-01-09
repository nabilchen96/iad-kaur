@extends('backend.app')
@push('style')
    <style>
        .act-btn {
            display: block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom: 30px;
            text-decoration: none !important;
            z-index: 9;
        }

        .act-btn:hover {
            background: white;
        }

        i {
            font-size: 14px !important;
        }
    </style>
@endpush
@section('content')
    <a data-toggle="modal" data-target="#modal" href="#" class="bg-primary act-btn">
        +
    </a>
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12 px-1">
            <div class="row">
                <div class="col-12 col-xl-8 mb-xl-0">
                    <h3 class="font-weight-bold">Data Anggota</h3>
                </div>
            </div>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col-12 px-1">
                <div class="input-group mb-3 mt-3">
                    <input type="text" value="{{ Request('q') }}" style="border: none;" class="form-control"
                        name="q" placeholder="Type to Search or Clear to See All Data ...">
                    <button onclick="showLoadingIndicator()" type="submit" style="border: none; height: 38px;"
                        class="input-group-text bg-primary text-white" id="basic-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="accordion" id="accordionExample">
        <div class="row">
            @foreach ($anggota as $k => $item)
                <div class="col-lg-4 mb-3 px-1">
                    <div class="card shadow">
                        <div class="card-body" style="padding: 1.25rem;">
                            <div class=""
                                style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
                                id="headingOne">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>
                                            <i class="bi bi-person"></i>
                                            <span class="text-danger">
                                                {{ $item->nama_lengkap }}
                                            </span>
                                        </p>
                                        <p><i class="bi bi-credit-card"></i>
                                            {{ $item->no_anggota }}
                                        </p>
                                        <p>
                                            <i class="bi bi-calendar3"></i>
                                            {{ $item->tempat_lahir }},
                                            {{ date('d/m/Y', strtotime($item->tanggal_lahir)) }}
                                        </p>
                                    </div>
                                    <p data-toggle="collapse" data-target="#collapse{{ $k + 1 }}">
                                        <i class="bi bi-chevron-down"></i>
                                    </p>
                                </div>
                            </div>

                            <div id="collapse{{ $k + 1 }}" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="">
                                    <p>
                                        <i class="bi bi-house"></i> {{ $item->alamat }}
                                    </p>
                                    <p>
                                        <span class="badge bg-success text-white" style="border-radius: 8px;">
                                            <i class="bi bi-circle"></i> {{ $item->agama }}
                                        </span>
                                    </p>
                                    <p>
                                        {{ $item->keterangan }}
                                    </p>
                                    <p><i class="bi bi-telephone"></i> {{ @$item->no_telp }}</p>
                                    <span class="badge bg-info text-white"
                                        style="border-radius: 8px;">{{ @$item->role }}</span>
                                    <span class="badge bg-primary text-white"
                                        style="border-radius: 8px;">{{ $item->jabatan }}</span>
                                    <a data-toggle="modal" data-target="#modal" data-item="{{ json_encode($item) }}"
                                        href="javascript:void(0)" class="badge bg-info text-white"
                                        style="border-radius: 8px;">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="#" onclick="hapusData({{ $item->id }})"
                                        class="badge bg-danger text-white" style="border-radius: 8px;">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form">
                    <div class="modal-header p-3">
                        <h5 class="modal-title m-2" id="exampleModalLabel">Anggota Form</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"
                                class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label>No. Anggota</label>
                            <input name="no_anggota" id="no_anggota" placeholder="No. Anggota"
                                class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control form-control-sm">
                                <option>Ketua Umum</option>
                                <option>Wakil Ketua</option>
                                <option>Bendahara</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                                class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" id="tanggal_lahir" placeholder="Tanggal Lahir"
                                class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" id="agama" class="form-control form-control-sm">
                                <option>Islam</option>
                                <option>Protestan</option>
                                <option>Katolik</option>
                                <option>Hindu</option>
                                <option>Budha</option>
                                <option>Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control form-control-sm" cols="30" rows="5"
                                placeholder="Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input name="no_telp" type="text" id="no_telp" placeholder="No Telp"
                                class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control form-control-sm" cols="30" rows="5"
                                placeholder="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer p-3 d-flex align-items-end d-flex align-items-end">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-danger btn-sm mr-1" data-dismiss="modal">Close</button>
                            <button id="tombol_kirim" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: formData.get('id') == '' ? '/store-anggota' : '/update-anggota',
                    data: formData,
                })
                .then(function(res) {
                    //handle success         
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: res.data.respon,
                            timer: 3000,
                            showConfirmButton: false
                        })

                        location.reload();

                    } else {

                        console.log('terjadi error');
                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
                    document.getElementById("tombol_kirim").disabled = false;
                    //handle error
                    console.log(res);
                });
        }

        hapusData = (id) => {
            Swal.fire({
                title: "Yakin hapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            }).then((result) => {

                if (result.value) {
                    axios.post('/delete-anggota', {
                            id
                        })
                        .then((response) => {
                            if (response.data.responCode == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    timer: 2000,
                                    showConfirmButton: false
                                })

                                location.reload();

                            } else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Gagal...',
                                    text: response.data.respon,
                                })
                            }
                        }, (error) => {
                            console.log(error);
                        });
                }

            });
        }

        $('#modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('item') // Extract info from data-* attributes
            console.log(recipient);

            document.getElementById("form").reset();
            document.getElementById('id').value = ''
            $('.error').empty();

            if (recipient) {
                var modal = $(this);
                modal.find('#id').val(recipient.id);
                modal.find('#nama_lengkap').val(recipient.nama_lengkap);
                modal.find('#no_anggota').val(recipient.no_anggota);
                modal.find('#jabatan').val(recipient.jabatan);
                modal.find('#tempat_lahir').val(recipient.tempat_lahir);
                modal.find('#tanggal_lahir').val(recipient.tanggal_lahir);
                modal.find('#agama').val(recipient.agama);
                modal.find('#alamat').val(recipient.alamat);
                modal.find('#no_telp').val(recipient.no_telp);
                modal.find('#keterangan').val(recipient.keterangan);
            }
        })
    </script>
@endpush
