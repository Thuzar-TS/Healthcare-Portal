<template>
  <div class="col-12 scrolldiv2 pb-3 tab-content">
    <div class="col-12">
      <div class="col-md-12 fav-his-header">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#c40000"><path d="M86,15.0472l-78.83333,70.9528h21.5v64.5h59.44694c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-43v-63.14225l43,-38.6888l57.61328,51.66439h21.22006zM136.19466,100.24935c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333c0,19.78717 16.04617,35.83333 35.83333,35.83333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM150.89193,119.24382l10.02213,10.03613l-28.30274,28.30274l-21.13606,-21.13607l10.02213,-10.03613l11.11393,11.11393z"></path></g></g></svg>
        &nbsp;<span class="font-weight-bold"> 最近見た施設</span>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/">ホーム</router-link>
          </li>

          <li class="breadcrumb-item active" aria-current="page">介護の歴史</li>
        </ol>
      </nav>
    </div>

    <div class="row m-0">
      <div v-for="nur_profile in nur_profiles" :key="nur_profile.id" class="col-lg-12 pt-3 bd">
        <div class="row m-0">
          <h5 class="m-b-10 col-12 hos-tit">
            <!-- <a href="#">{{nur_profile.name}}</a> -->
            <router-link
              :to="{name: 'profile', params: {cusid:nur_profile.customer_id, type: 'nursing'}}"
            >{{nur_profile.name}}</router-link>
          </h5>

          <div class="col-lg-2 col-md-12 mb-5">
            <div class="hos-img list-logo">
              <img v-bind:src="'/images/' + nur_profile.logo" alt />
            </div>

            <button class="btn btn-danger all-btn hos-btn">最近見た施設から削除</button>

            <button class="btn btn-success all-btn hos-btn mt-2">検討リストに追加</button>
          </div>

          <div class="col-lg-7 col-md-12 mb-4">
            <div class="row list-wrap">
              <div class="col-lg-3 col-md-4 col-sm-12">
                <p>
                  <strong>公式サイト</strong>
                </p>
              </div>

              <div class="col-lg-9 col-md-8 col-sm-12">
                <p>
                  <a href="#" target="_blank">{{nur_profile.website}}</a>
                </p>
              </div>
            </div>

            <div class="row list-wrap">
              <div class="col-lg-3 col-md-4 col-sm-12">
                <p>
                  <strong>交通アクセス</strong>
                </p>
              </div>

              <div class="col-lg-9 col-md-8 col-sm-12">
                <p>{{nur_profile.access}}</p>
              </div>
            </div>

            <div class="row list-wrap">
              <div class="col-lg-3 col-md-4 col-sm-12">
                <p>
                  <strong>メールアドレス</strong>
                </p>
              </div>

              <div class="col-lg-9 col-md-8 col-sm-12">
                <p>{{nur_profile.email}}</p>
              </div>
            </div>

            <div class="row list-wrap">
              <div class="col-lg-3 col-md-4 col-sm-12">
                <p>
                  <strong>入居条件</strong>
                </p>
              </div>

              <div class="col-lg-9 col-md-8 col-sm-12">
                <p>{{nur_profile.occupancy_condition}}</p>
              </div>
            </div>

            <div class="row list-wrap">
              <div class="col-lg-3 col-md-4 col-sm-12">
                <p>
                  <strong>住所</strong>
                </p>
              </div>

              <div class="col-lg-9 col-md-8 col-sm-12">
                <p>{{nur_profile.township_name}}, {{nur_profile.city_name}}</p>
              </div>
            </div>

            <!-- <div class="pad-free mb-2">

                <strong>Website :</strong>

                <a href>{{nur_profile.website}}</a>

                <br />

                <a>

                  <strong>Phone :</strong>

                  {{nur_profile.phone}}

                </a>

                <br />

                <a>

                  <strong>Access :</strong>

                  {{nur_profile.access}}

                </a>

                <br />

                <a>

                  <strong>Email :</strong>

                  {{nur_profile.email}}

                </a>

                <br />

                <a>

                  <strong>Occupancy Condition :</strong>

                  {{nur_profile.occupancy_condition}}

                </a>

                <br />

                <a>

                  <strong>Location :</strong>

                  {{nur_profile.township_name}}, {{nur_profile.city_name}}

                </a>

                <br />

            </div>-->
          </div>

          <div class="col-lg-3 col-md-12">
            <ul class="fac_container">
              <li
                v-for="feature in nur_profile.special_features"
                :key="feature.id"
              >{{ feature.short_name }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nur_profiles: [],

      local_sto: "",

      type: "nursing",

      specialfeature: []
    };
  },

  created() {
    this.local_sto = localStorage.getItem("nursing_history");

    this.getAllCustomer(this.local_sto);

    this.axios
      .get(`/api/profile/specialfeature/${this.type}`)
      .then(response => {
        this.specialfeature = response.data;
      });
  },

  methods: {
    // changeRoute(){

    //     this.$router.push({name:'home', params: {page:'subtab3'}});

    // },

    getAllCustomer: function(local_storage) {
      this.axios

        .post("/api/nursing_history/" + local_storage)

        .then(response => {
          this.nur_profiles = response.data;
        });
    }
  }
};
</script>