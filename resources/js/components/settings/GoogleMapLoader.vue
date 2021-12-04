<template>
  <div class="content-wrapper"> 

   <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Resto Maps</h1>
                        <p><b>Data Jenis</b> merupakan kategori yang akan di gunakan untuk membedakan item barang berdasarkan jenis nya. <br> Cth : Barang Aksesoris/Barang Non Stock (pulsa elektrik ) dll.</p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Maps</a></li>
                            <li class="breadcrumb-item active">Level</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    <div class="google-map" ref="googleMap"></div>
    <template  >
      <slot
        :google="google"
        :map="map"
      />
    </template>
  </div>
</template>

<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'

export default {
  props: {
    mapConfig: Object,
    apiKey: 'AIzaSyAl9cbc9lKYCPmzqQr1HJjhA5o0ASZhLPM',
  },

  data() {
    return {
      google: null,
      map: null
    }
  },

  async mounted() {
    const googleMapApi = await GoogleMapsApiLoader({
      apiKey:"AIzaSyAl9cbc9lKYCPmzqQr1HJjhA5o0ASZhLPM"
    })
    this.google = googleMapApi
    this.initializeMap()
  },

  methods: {
    initializeMap() {
      const mapContainer = this.$refs.googleMap
      this.map = new this.google.maps.Map(
        mapContainer, this.mapConfig
      )
    }
  }
}
</script>