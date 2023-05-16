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
      <h4>
        Survei Penilaian Integritas Pendidikan 2023
      </h4>
      <img src={{ asset('images/logo_SPI_pendidikan.png') }} class="img-fluid" alt="" />
      <p class="small">
        Survei Penilaian Integritas Pendidikan (SPI-P) merupakan pengukuran yang digunakan sebagai upaya untuk memetakan kondisi integritas pendidikan, risiko korupsi dan capaian implementasi pendidikan antikorupsi yang dilakukan oleh stakeholder sektor pendidikan. SPI-P akan memotret praktik integritas, baik pada lingkup perilaku peserta didik maupun ekosistem pendidikan yang mempengaruhinya seperti tenaga pendidik, tenaga kependidikan dan aspek pengelolaan, termasuk dalam interaksinya dengan berbagai elemen/jejaring pendidikan. KPK berharap partisipasi Bapak/Ibu untuk mengisi data populasi satuan pendidikan berikut yang akan digunakan sebagai data responden. Partisipasi Bapak/Ibu sangat berharga dalam menentukan keberhasilan pelaksanaan SPI-P 2023. Terima kasih.
      </p>
  @endcomponent
  
  <div class="dashboard-page-wrap mb-5" id="locations">
    <div class="container">
      {{-- Template excel --}}
      <h5 class="title">
        Silahkan unduh dan lengkapi file berikut sesuai jenjang pendidikan
      </h5>
      <div class="mt-3">
        <div class="mb-3">
          <a
            href="{{ route('download-template-sekolah') }}" 
            class="btn btn-warning"
            data-bs-toggle="tooltip" 
            data-bs-placement="right" 
            data-bs-custom-class="custom-tooltip" 
            data-bs-title="Pimpinan sekolah, guru, siswa, dan orangtua siswa."
            type="button"
          >
            Template Sekolah
          </a>
        </div>
        <div>
          <a href="{{ route('download-template-pt') }}" 
            class="btn btn-warning"
            data-bs-toggle="tooltip-pt" 
            data-bs-placement="right" 
            data-bs-custom-class="custom-tooltip" 
            data-bs-title="Pimpinan perguruan tinggi, dosen, dan mahasiswa."
            type="button">
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
          <a 
            class="nav-link" 
            id="nav-profile-tab" 
            data-bs-toggle="tab" 
            href="#perguruan-tinggi" 
            role="tab" 
            aria-controls="nav-internasional" 
            aria-selected="false">
              Perguruan Tinggi
          </a>
        </div>
      </nav>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="nasional" role="tabpanel" aria-labelledby="nasional-tab">
          <div class="card mt-3">
            <div class="card-header">
              Cari sekolah berdasarkan NPSN
            </div>
            <div class="card-body">
              
                {{-- NPSN --}}
                <div class="col-6">
                  <label for="npsn" class="form-label">Cari Sekolah</label>
                  <input 
                    type="text" 
                    name="npsn" 
                    id="npsn"
                    v-model="npsn"
                    class="form-control" 
                    placeholder="Cari Sekolah">
                </div>
                <div class="mt-3">
                  <button @click="changeItem" type="submit" class="btn btn-primary">Cari</button>
                </div>

            </div>
          </div>
          <div class="card mt-3">
            <div class="card-header fw-bold">
              Form Satuan Pendidikan Dalam Negeri
            </div>
            <div class="card-body">
              <form action="{{ route('store-school') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="">
                  {{-- Provinsi --}}
                  <div class="col-6 mt-3">
                    <label for="provinces_id" class="form-label">Provinsi*</label>
                    <input 
                      type="text" 
                      class="form-control @error('province_id') is-invalid @enderror" 
                      name="provinsi"
                      :value="province" 
                      id="provinces_id"
                      >
                    @error('province_id')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  {{-- Kabupaten/Kota --}}
                  <div class="col-6 mt-3">
                    <label for="kabupaten" class="form-label">Kabupaten/kota*</label>
                    <input 
                      type="text" 
                      class="form-control @error('regency_id') is-invalid @enderror" 
                      name="kabupaten"
                      :value="kabupaten"  
                      id="kabupaten"
                      
                      >
                    @error('regency_id')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  {{-- Satuan Pendidikan --}}
                  <div class="col-6 mt-3">
                    <label for="satuan_pendidikan" class="form-label">Satuan Pendidikan*</label>
                    <input 
                      type="text" 
                      class="form-control @error('satuan_pendidikan') is-invalid @enderror" 
                      name="satuan_pendidikan" 
                      :value="satuanPendidikan" 
                      id="satuan_pendidikan"
                      
                      >
                    @error('satuan_pendidikan')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  {{-- Jenjang Pendidikan --}}
                  <div class="col-6 mt-3">
                    <label for="jenjang" class="form-label">Jenjang*</label>
                    <input 
                      type="text" 
                      class="form-control @error('jenjang_pendidikan') is-invalid @enderror" 
                      name="jenjang_pendidikan" 
                      :value="jenjang" 
                      id="jenjang"
                      
                      >
                    @error('jenjang_pendidikan')
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
                      placeholder="Masukkan NPSN jika NPSN pada pilihan di atas tidak sesuai">
                      @error('npsn')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                      @enderror
                  </div>
                  {{-- Nama Narahubung --}}
                  <div class="col-6 mt-3">
                    <label for="nama_pic" class="form-label">Nama Narahubung*</label>
                    <input type="text" name="nama_pic" id="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror" placeholder="">
                    @error('nama_pic')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  {{-- Jabatan Narahubung --}}
                  <div class="col-6 mt-3">
                    <label for="jabatan_pic" class="form-label">Jabatan Narahubung*</label>
                    <input type="text" name="jabatan_pic" id="jabatan_pic" class="form-control @error('jabatan_pic') is-invalid @enderror" placeholder="">
                    @error('jabatan_pic')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  {{-- Contact Narahubung --}}
                  <div class="col-6 mt-3">
                    <label for="no_pic" class="form-label">Contact Narahubung*</label>
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
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="internasional" role="tabpanel" aria-labelledby="internasional-tab">
          <form action="{{ route('international-school') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
              <h5 class="title">
                Form satuan pendidikan Luar Negeri
              </h5>
              <div class="col-6 mt-3">
                <label for="jenjang_pendidikan" class="form-label">Jenjang pendidikan*</label>
                <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" 
                  name="jenjang_pendidikan" id="jenjang_pendidikan">
                  <option value="">-- Pilih Jenjang --</option>
                  <option value="sd">SD</option>
                  <option value="smp">SMP</option>
                  <option value="SMA">SMA</option>
                </select>
                {{-- @error('jenjang_pendidikan')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="negara" class="form-label">Negara*</label>
                <select 
                  class="form-select @error('negara') is-invalid @enderror" 
                  id="negara" 
                  name="country_id"
                  v-model="countries_id" >
                  <option disabled value="" selected>-- Pilih Negara --</option>
                  <option v-for="country in countries" :value="country.id">@{{ country.name }}</option>
                </select>
                {{-- @error('negara')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="satuan_pendidikan" class="form-label">Satuan Pendidikan*</label>
                <select 
                  class="form-select @error('satuan_pendidikan') is-invalid @enderror" 
                  name="satuan_pendidikan" 
                  id="satuan_pendidikan" 
                  v-model="foreignSchools_id">
                  <option disabled value="">-- Pilih --</option>
                  <option v-for="foreign in foreignSchools" :value="foreign.nama_sekolah">@{{ foreign.nama_sekolah }}</option>
                </select>
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
                  placeholder="Masukkan NPSN jika NPSN pada pilihan di atas tidak sesuai">
                  {{-- @error('npsn')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                  @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="nama_pic" class="form-label">Nama Narahubung*</label>
                <input type="text" name="nama_pic" id="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror" placeholder="">
                {{-- @error('nama_pic')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="jabatan_pic" class="form-label">Jabatan Narahubung*</label>
                <input type="text" name="jabatan_pic" id="jabatan_pic" class="form-control @error('jabatan_pic') is-invalid @enderror" placeholder="">
                {{-- @error('jabatan_pic')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="no_pic" class="form-label">Contact Narahubung*</label>
                <input type="number" name="no_pic" id="no_pic" class="form-control @error('no_pic') is-invalid @enderror" placeholder="">
                {{-- @error('no_pic')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror --}}
              </div>
              <div class="col-6 mt-3">
                <label for="document" class="form-label">Upload Document</label>
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
        <div class="tab-pane fade" id="perguruan-tinggi" role="tabpanel" aria-labelledby="contact-tab">
          <form action="{{ route('college') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
              <h5 class="title">
                Form Perguruan Tinggi
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
                  name="province" 
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
              {{-- Kabupaten --}}
              <div class="col-6 mt-3">
                <label for="regency_id" class="form-label">Kabupaten/Kota*</label>
                <select 
                  class="form-select @error('regency_id') is-invalid @enderror" 
                  name="regency" 
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
              {{-- Perguruan Tinggi --}}
              <div class="col-6 mt-3">
                <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi*</label>
                <input 
                  type="text" 
                  name="perguruan_tinggi" 
                  id="perguruan_tinggi" 
                  class="form-control @error('nama_pic') is-invalid @enderror" placeholder="">
                @error('perguruan_tinggi')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              {{-- Nama Narahubung --}}
              <div class="col-6 mt-3">
                <label for="nama_narahubung" class="form-label">Nama Narahubung*</label>
                <input 
                  type="text"
                  name="nama_narahubung" 
                  id="nama_narahubung" 
                  class="form-control @error('nama_narahubung') is-invalid @enderror" placeholder="">
                @error('nama_narahubung')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-6 mt-3">
                <label for="jabatan_narahubung" class="form-label">Jabatan Narahubung*</label>
                <input 
                  type="text" 
                  name="jabatan_narahubung" 
                  id="jabatan_narahubung" 
                  class="form-control @error('jabatan_narahubung') is-invalid @enderror" placeholder="">
                @error('jabatan_narahubung')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-6 mt-3">
                <label for="no_narahubung" class="form-label">Nomor/Wa Narahubung*</label>
                <input 
                  type="number" 
                  name="no_narahubung" 
                  id="no_narahubung" 
                  class="form-control @error('no_narahubung') is-invalid @enderror" placeholder="">
                @error('no_narahubung')
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
          this.getCountriesData();
        },
        data: {
          province: '',
          kabupaten: '',
          satuanPendidikan: '',
          npsn: '',
          jenjang: '',
          countries: null,
          provinces: null,
          regencies: null,
          schools: null,
          foreignSchools: null,
          countries_id: '',
          provinces_id: '',
          regencies_id: '',
          schools_id: '',
          foreignSchools_id: '',
        },
        methods: {
          async changeItem() {
            const noNpsn = this.npsn
            const { data } = await axios.get(`https://jaga.id/api/v5/sekolah?npsn=${noNpsn}`)
            
            const provinsi = data.data.result[0].provinsi
            const kabupaten = data.data.result[0].kota_kab
            const satuanPendidikan = `${data.data.result[0].npsn} - ${data.data.result[0].nama}`
            const jenjang = data.data.result[0].bentuk_pendidikan

            this.province = provinsi
            this.kabupaten = kabupaten
            this.satuanPendidikan = satuanPendidikan
            this.jenjang = jenjang

          },
          getCountriesData() {
            var self = this;
            axios.get('{{ route('api-countries') }}')
              .then(function (response) {
                  self.countries = response.data;
              })
          },
          getForeignSchoolsData() {
            var self = this;
            axios.get('{{ url('api/foreign') }}/' + self.countries_id)
              .then(function (response) {
                self.foreignSchools = response.data;
            })
          },
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces')}}')
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
          countries_id: function(val, oldVal) {
            this.foreignSchools_id = null;
            this.getForeignSchoolsData();
          }
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

  @push('script-js')
    <script>
      document.querySelectorAll('[data-bs-toggle="tooltip"]')
    .forEach(tooltip => {
      new bootstrap.Tooltip(tooltip)
    })
    </script>

    <script>
      document.querySelectorAll('[data-bs-toggle="tooltip-pt"]')
    .forEach(tooltip => {
      new bootstrap.Tooltip(tooltip)
    })
    </script>
  @endpush
      
@endsection