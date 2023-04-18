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

      {{-- Form --}}
      <form action="">
        <div class="mt-4" id="locations">
          <h5 class="title">
            Form satuan pendidikan
          </h5>
          <div class="col-6 mt-3">
            <label for="selectJenjang" class="form-label">Jenjang pendidikan</label>
            <select class="form-select" name="jenjang" id="selectJenjang">
              <option selected>Pilih jenjang</option>
              <option value="sd">SD</option>
              <option value="smp">SMP</option>
              <option value="SMA">SMA</option>
              <option value="PT">PERGURUAN TINGGI</option>
            </select>
          </div>
          {{-- <div class="col-6 mt-3">
            <label for="selectWilayah" class="form-label">Wilayah</label>
            <select class="form-select" name="wilayah" id="selectJenjang">
              <option selected>Pilih Wilayah</option>
              <option value="dalam_negeri">Dalam Negeri</option>
              <option value="luar_negeri">Luar Negeri</option>
            </select>
          </div> --}}
          <div class="col-6 mt-3">
            <label for="provinces_id" class="form-label">Provinsi</label>
            <select class="form-select" id="provinces_id" name="provinces_id" v-if="provinces" v-model="provinces_id">
              <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
            </select>
            <select v-else class="form-select"></select>
          </div>
          <div class="col-6 mt-3">
            <label for="regencies_id" class="form-label">Kabupaten/Kota</label>
            <select class="form-select" name="regencies_id" id="regencies_id" v-if="regencies" v-model="regencies_id">
              <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
            </select>
            <select v-else class="form-select"></select>
          </div>
          <div class="col-6 mt-3">
            <label for="schools_id" class="form-label">Satuan Pendidikan</label>
            <select class="form-select" name="schools_id" id="schools_id" v-if="schools" v-model="schools_id">
              <option v-for="school in schools" :value="school.id">@{{ school.nama_sekolah }}</option>
            </select>
            <select v-else class="form-select"></select>
          </div>
          <div class="col-6 mt-3">
            <label for="npsn" class="form-label">NPSN</label>
            <input type="text" name="npsn" id="npsn" class="form-control" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="pic" class="form-label">Nama PIC</label>
            <input type="number" name="pic" id="pic" class="form-control" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="jabatan_pic" class="form-label">Jabatan PIC</label>
            <input type="text" name="jabatan_pic" id="jabatan_pic" class="form-control" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="no_wa" class="form-label">No WA</label>
            <input type="number" name="no_wa" id="no_wa" class="form-control" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" name="file" id="file" class="form-control">
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>

    </div>
  </div>
  
  @push('addon-script')
    <script src="{{ asset('vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          this.getProvincesData();
        },
        data: {
          jenjang: null,
          provinces: null,
          regencies: null,
          schools: null,
          provinces_id: null,
          regencies_id: null,
          schools_id: null
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
          }
        }
      })
    </script>
  @endpush
      
@endsection