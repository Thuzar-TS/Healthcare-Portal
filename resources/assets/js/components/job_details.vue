<template>
  <div class="tab-content job-detail">
    <div class="row m-0" v-for="jobDetail in job_details" :key="jobDetail.id">
      <h4 class="h_4 header m-4">{{job_details.title}}</h4>
      <label>求人番号: {{jobDetail.jobid}}</label>
      <div class="col-sm-10 offset-1">
        <!-- <img src="/images/img1.jpg" class="img-responsive" style="width:150px;"> -->
        <div class="form-wrap mt-3">
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>仕事内容</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.description}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>経験・スキル</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.skills}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>勤務地</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.location}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>最寄り駅</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.nearest_station}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>雇用形態</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.employment_status}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>給与</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.salary}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>諸手当</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.allowances}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>各種保険</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.insurance}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-3 col-sm-12 form-left">
              <label>就業時間</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.working_hours}}</div>
          </div>
          <div class="form-group m-0 row bd-all">
            <div class="col-md-3 col-sm-12 form-left">
              <label>休日休暇</label>
            </div>
            <div class="col-md-9 col-sm-12 form-right">{{jobDetail.holidays}}</div>
          </div>
          <!-- <h4 style="padding:3px;"></h4> -->
          <div class="row mt-4">
            <div class="col-md-12 text-center">
              <!-- <button type="button" class="btn btn-warning btn-width white">戻る</button> -->
              <span class="btn main-bg-color white all-btn" @click="jobApply()" >確認画面へ進む</span>
              <!-- <router-link to="/jobapply" class="btn secondary-bg-color white all-btn">この案件に応募</router-link> -->
            </div>
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
      job_details: [],
      job_id: ""
    };
  },
  created() {
    this.axios
      .get(`/api/job_details/${this.$route.params.id}`)
      .then(response => {
        console.log(response.data);
        this.job_details = response.data;
      });
    this.job_id = this.$route.params.id;
  },
  methods: {
    jobApply() {
      this.$router.push({name: 'jobapply' , params: { job_id: this.job_id}});
    }
  }
};
</script>
