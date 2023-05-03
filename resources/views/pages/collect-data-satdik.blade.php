@extends('layouts.app')

@section('title')
	Form Satuan Pendidikan
@endsection

@section('content')
  <!-- Section sekolah -->
  @component('components.title')
      @slot('title')
        Pengumpulan data satuan pendidikan
      @endslot
      <h6>
        Form Data satuan pendidikan
      </h6>
  @endcomponent
  
  <div class="dashboard-page-wrap mb-5">
    <div class="container">
      {{-- Template excel --}}
      <h5 class="title">
        Silahkan unduh dan lengkapi file berikut sesuai jenjang pendidikan
      </h5>
      <div class="mt-3">
        <div class="mb-3">
          <a href="{{ route('download-template-sekolah') }}" class="btn btn-warning" type="button">
            Template Sekolah
          </a>
        </div>
        <div>
          <a href="{{ route('download-template-pt') }}" class="btn btn-warning" type="button">
            Template Perguruan Tinggi
          </a>
        </div>
      </div>

      <hr class="border border-primary border-1 opacity-50">

      {{-- Panel Form --}}
      <nav class="mt-4">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a 
            class="nav-link active" 
            data-bs-toggle="tab" 
            href="#nasional" 
            role="tab" 
            aria-controls="nav-nasional" 
            aria-selected="true">
              Dalam Negeri
          </a>
          <a 
            class="nav-link" 
            id="nav-profile-tab" 
            data-bs-toggle="tab" 
            href="#internasional" 
            role="tab" 
            aria-controls="nav-internasional" 
            aria-selected="false">
              Luar Negeri
          </a>
        </div>
      </nav>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="nasional" role="tabpanel" aria-labelledby="nasional-tab">
          <div id="locations">
            <form action="{{ route('store-school') }}" method="POST" enctype="multipart/form-data" v-if="jenjang != 'PT'" >
              @csrf
              <div class="mt-4">
                <h5 class="title">
                  Form Satuan Pendidikan Dalam Negeri
                </h5>
                {{-- Jenjang Pendidikan --}}
                <div class="col-6 mt-3">
                  <label for="selectJenjang" class="form-label">Jenjang pendidikan*</label>
                  <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" 
                    name="jenjang_pendidikan" id="selectJenjang" v-model="jenjang">
                    <option value="">Pilih jenjang</option>
                    <option value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="PT">PERGURUAN TINGGI</option>
                  </select>
                  @error('jenjang_pendidikan')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                {{-- Provinsi --}}
                <div class="col-6 mt-3">
                  <label for="provinces_id" class="form-label">Provinsi*</label>
                  <select 
                    class="form-select @error('province_id') is-invalid @enderror" 
                    id="province_id" 
                    name="province_id" 
                    v-model="provinces_id">
                    <option disabled value="">-- Pilih Provinsi --</option>
                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                  </select>
                  @error('province_id')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                {{-- Kabupaten/Kota --}}
                <div class="col-6 mt-3">
                  <label for="regency_id" class="form-label">Kabupaten/Kota*</label>
                  <select 
                    class="form-select @error('regency_id') is-invalid @enderror" 
                    name="regency_id" 
                    id="regency_id"  
                    v-model="regencies_id">
                    <option disabled value="">-- Pilih --</option>
                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                  </select>
                  @error('regency_id')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                {{-- Satuan Pendidikan --}}
                <div class="col-6 mt-3">
                  <label for="satuan_pendidikan" class="form-label">Satuan Pendidikan*</label>
                  <select 
                    class="form-select @error('satuan_pendidikan') is-invalid @enderror" 
                    name="satuan_pendidikan" 
                    id="satuan_pendidikan" 
                    v-model="schools_id">
                    <option disabled value="">-- Pilih --</option>
                    <option v-for="school in schools" :value="school.nama_sekolah">@{{ school.nama_sekolah }}</option>
                  </select>
                  @error('satuan_pendidikan')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                {{-- NPSN --}}
                <div class="col-6 mt-3">
                  <label for="npsn" class="form-label">NPSN</label>
                  <input 
                    type="text" 
                    name="npsn" 
                    id="npsn" 
                    class="form-control @error('npsn') is-invalid @enderror" 
                    placeholder="">
                    @error('npsn')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                </div>
                {{-- Nama PIC --}}
                <div class="col-6 mt-3">
                  <label for="nama_pic" class="form-label">Nama PIC*</label>
                  <input type="text" name="nama_pic" id="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror" placeholder="">
                  @error('nama_pic')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                {{-- Jabatan PIC --}}
                <div class="col-6 mt-3">
                  <label for="jabatan_pic" class="form-label">Jabatan PIC*</label>
                  <input type="text" name="jabatan_pic" id="jabatan_pic" class="form-control @error('jabatan_pic') is-invalid @enderror" placeholder="">
                  @error('jabatan_pic')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                {{-- Contact PIC --}}
                <div class="col-6 mt-3">
                  <label for="no_pic" class="form-label">Contact PIC*</label>
                  <input type="number" name="no_pic" id="no_pic" class="form-control @error('no_pic') is-invalid @enderror" placeholder="">
                  @error('no_pic')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                {{-- Upload Document --}}
                <div class="col-6 mt-3">
                  <label for="document" class="form-label">Upload Document*</label>
                  <input type="file" name="document" id="document" class="form-control @error('document') is-invalid @enderror">
                  @error('document')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
            <form action="" method="POST" enctype="multipart/form-data" v-else>
              @csrf
              <div class="mt-4">
                <h5 class="title">
                  Form Perguruan Tinggi
                </h5>
                <div class="col-6 mt-3">
                  <label for="selectJenjang" class="form-label">Jenjang pendidikan*</label>
                  <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" 
                    name="jenjang_pendidikan" id="selectJenjang" v-model="jenjang">
                    <option value="">Pilih jenjang</option>
                    <option value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="PT">PERGURUAN TINGGI</option>
                  </select>
                  @error('jenjang_pendidikan')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="provinces_id" class="form-label">Provinsi*</label>
                  <select 
                    class="form-select @error('province_id') is-invalid @enderror" 
                    id="province_id" 
                    name="province_id" 
                    v-model="provinces_id">
                    <option disabled value="">-- Pilih Provinsi --</option>
                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                  </select>
                  @error('province_id')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="regency_id" class="form-label">Kabupaten/Kota*</label>
                  <select 
                    class="form-select @error('regency_id') is-invalid @enderror" 
                    name="regency_id" 
                    id="regency_id"  
                    v-model="regencies_id">
                    <option disabled value="">-- Pilih --</option>
                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                  </select>
                  @error('regency_id')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi*</label>
                  <select 
                    class="form-select @error('perguruan_tinggi') is-invalid @enderror" 
                    name="perguruan_tinggi" 
                    id="perguruan_tinggi" 
                    >
                    <option disabled value="">-- Pilih --</option>
                  </select>
                  @error('perguruan_tinggi')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="npsn" class="form-label">NPSN</label>
                  <input 
                    type="text" 
                    name="npsn" 
                    id="npsn" 
                    class="form-control @error('npsn') is-invalid @enderror" 
                    placeholder="">
                    @error('npsn')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="nama_pic" class="form-label">Nama PIC*</label>
                  <input type="text" name="nama_pic" id="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror" placeholder="">
                  @error('nama_pic')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="jabatan_pic" class="form-label">Jabatan PIC*</label>
                  <input type="text" name="jabatan_pic" id="jabatan_pic" class="form-control @error('jabatan_pic') is-invalid @enderror" placeholder="">
                  @error('jabatan_pic')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="no_pic" class="form-label">Contact PIC*</label>
                  <input type="number" name="no_pic" id="no_pic" class="form-control @error('no_pic') is-invalid @enderror" placeholder="">
                  @error('no_pic')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="col-6 mt-3">
                  <label for="document" class="form-label">Upload Document*</label>
                  <input type="file" name="document" id="document" class="form-control @error('document') is-invalid @enderror">
                  @error('document')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="internasional" role="tabpanel" aria-labelledby="internasional-tab">
          <form action="{{ route('international-school') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4" id="locations">
              <h5 class="title">
                Form satuan pendidikan Luar Negeri
              </h5>
              <div class="col-6 mt-3">
                <label for="jenjang_pendidikan" class="form-label">Jenjang pendidikan</label>
                <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" 
                  name="jenjang_pendidikan" id="jenjang_pendidikan">
                  <option value="">-- Pilih Jenjang --</option>
                  <option value="sd">SD</option>
                  <option value="smp">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="PT">PERGURUAN TINGGI</option>
                </select>
                {{-- @error('jenjang_pendidikan')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="negara" class="form-label">Negara</label>
                <select 
                  class="form-select @error('negara') is-invalid @enderror" 
                  id="negara" 
                  name="negara" >
                  <option disabled value="" selected>-- Pilih --</option>
                  <option value="malaysia">Malaysia</option>
                  <option value="arab-saudi">Arab Saudi</option>
                  <option value="myanmar">Myanmar</option>
                </select>
                {{-- @error('negara')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="satuan_pendidikan" class="form-label">Satuan Pendidikan</label>
                <input 
                  type="text" 
                  name="satuan_pendidikan" 
                  id="satuan_pendidikan" 
                  class="form-control @error('satuan_pendidikan') is-invalid @enderror" 
                  placeholder="">
                {{-- @error('satuan_pendidikan')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="npsn" class="form-label">NPSN</label>
                <input 
                  type="text" 
                  name="npsn" 
                  id="npsn" 
                  class="form-control @error('npsn') is-invalid @enderror" 
                  placeholder="">
                  {{-- @error('npsn')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="nama_pic" class="form-label">Nama PIC</label>
                <input type="text" name="nama_pic" id="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror" placeholder="">
                {{-- @error('nama_pic')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="jabatan_pic" class="form-label">Jabatan PIC</label>
                <input type="text" name="jabatan_pic" id="jabatan_pic" class="form-control @error('jabatan_pic') is-invalid @enderror" placeholder="">
                {{-- @error('jabatan_pic')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="no_pic" class="form-label">Contact PIC</label>
                <input type="number" name="no_pic" id="no_pic" class="form-control @error('no_pic') is-invalid @enderror" placeholder="">
                {{-- @error('no_pic')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="document" class="form-label">Upload File</label>
                <input type="file" name="document" id="document" class="form-control @error('document') is-invalid @enderror">
                {{-- @error('document')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur. Laborum, placeat.</div>
      </div>

    </div>
  </div>

  @push('addon-script')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          this.getProvincesData();
        },
        data: {
          jenjang: '',
          provinces: null,
          regencies: null,
          schools: null,
          provinces_id: '',
          regencies_id: '',
          schools_id: ''
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function (response) {
                  self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                self.regencies = response.data;
            })
          },
          getSchoolsData() {
            var self = this;
            axios.get('{{ url('api/schools') }}/' + self.regencies_id)
              .then(function (response) {
                self.schools = response.data;
            })
          }
        },
        watch: {
          provinces_id: function(val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
          regencies_id: function(val, oldVal) {
            this.schools_id = null;
            this.getSchoolsData();
          },
        }
      })
    </script>
  @endpush

  {{-- Toastr --}}
  @push('prepend-script')
    <script>
      // toast option
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-center"
      }
      // Display an info toast with no title
      @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
      @elseif (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
      @endif
    </script>
  @endpush
      
@endsection