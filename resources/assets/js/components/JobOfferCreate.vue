
<template>
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="col-md-12">
                    <h4 class="page-header header">{{ header }}</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-10 offset-1">
                            <form @submit.prevent="add" class="m-t-16">
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="title"><strong> 施設種別 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="title" class="form-control box" id="title" name="title" v-model="joboffer.title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <span v-if="errors.title" class="error">{{errors.title[0]}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="description"><strong> 仕事内容 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" cols="50" rows="5" v-model="joboffer.description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <span v-if="errors.description" class="error">{{errors.description[0]}}</span>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <!-- <span id="addnew"><a href="javascript:new_link()" class="btn btn-sm main-bg-color all-btn white">  Add New Skill  </a></span> -->
                                        <a class="btn btn-success" @click="addRow">新スキルを追加</a>
                                        <!-- <a class="btn btn-danger"   @click="delRow">Delete</a> -->
                                    </div>
                                </div>
                                <div class="form-group row sk" id="newlinktpl" v-for="(field,id) in joboffer.fields" :key="id">
                                    <div class="col-sm-3 ">
                                        <label for="skill"><strong> 経験・スキル </strong><span class="error sp1">必須</span></label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" v-model="field.skills">
                                        <!-- <input type="text" class="form-control"  v-model="joboffer.skills" >  -->
                                    </div>
                                    <div class="col-sm-2">
                                        <a class="text-danger" style="padding-top: 1px;" href="#" @click="delRow(id)">削除</a>
                                    </div>
                                </div>
                                <div id="newlink"></div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="location"><strong> 勤務地 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="location" class="form-control" cols="50" rows="5" v-model="joboffer.location"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <span v-if="errors.location" class="error">{{errors.location[0]}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="neareststation"><strong> 最寄り駅 </strong><span class="error sp1">必須</span> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="neareststation" class="form-control" cols="50" rows="5" v-model="joboffer.nearest_station"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <div class="col-sm-3 ">
                                        <label for="neareststation"><strong> 雇用形態 </strong><span class="error sp1">必須</span> </label>
                                    </div>
                                    <div class="col-sm-9">

                                        <label>
                                           <input type="radio"  value="ContractEmployee"  v-model="joboffer.employmentstatus"> <strong>契約社員 </strong>
                                        </label>
                                        <label>
                                            <input type="radio"  value="Part"  v-model="joboffer.employmentstatus"> <strong>非常勤 </strong>
                                        </label>
                                        <label>
                                            <input type="radio"  value="Full"  v-model="joboffer.employmentstatus"><strong> 正職員 </strong>
                                        </label>
                                          <label>
                                            <input type="radio"  value="Other"  v-model="joboffer.employmentstatus"><strong> その他 </strong>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <span v-if="errors.employment_status" class="error">{{errors.employment_status[0]}}</span>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="salary"><strong> Occupation <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                       <select v-model="selectedValue" class="form-control" @change='getParent()'>
                                            <option value="0">None</option>
                                            <option v-for="occupation in OccupationList" :key="occupation.id" v-bind:value="occupation.id">
                                                {{occupation.name}}
                                            </option>
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="salary"><strong> 給与 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" v-model="joboffer.salary" name="salary">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <span v-if="errors.salary" class="error">{{errors.salary[0]}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="allowance"><strong> 諸手当 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="allowance" class="form-control" cols="50" rows="5" v-model="joboffer.allowances"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="insurance"><strong> 各種保険 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="insurance" class="form-control" cols="50" rows="5" v-model="joboffer.insurance"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="workhour"><strong> 就業時間 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="workhour" class="form-control" name="workhour" v-model="joboffer.working_hours">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <span v-if="errors.working_hours" class="error">{{errors.working_hours[0]}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ">
                                        <label for="holiday"><strong> 休日休暇 <span class="error sp1">必須</span></strong> </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="holiday" class="form-control" cols="50" rows="5" v-model="joboffer.holidays"></textarea>
                                    </div>
                                </div>
                                <div class="form- group row">
                                    <div class="col-sm-3"></div>
                                </div>
                                <div class="form-group ">
                                    <router-link class="btn btn-danger all-btn" to="/jobofferlist"> 戻る </router-link>
                                    <button class="btn news-post-btn all-btn">作成</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2"></div>
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
                    errors: [],  
                    OccupationList:{
                        id: '',
                        name: ''
                   },        
                    joboffer: {

                        title: '',
                        customer_id: '',
                        occupation_id:'',
                        description: '',
                        fields: [{
                            skills: '',
                            id: ''
                        }],
                        location: '',
                        nearest_station: '',
                        employmentstatus:'',
                        employment_status: [{
                            pchecked: false,
                            fchecked: false,
                            echecked: false,
                            cchecked: false,
                            ochecked: false
                        }],
                        salary: '',
                        insurance: '',
                        working_hours: '',
                        holidays: '',
                        user_id: '',
                        recordstatus: '',
                              
                    },
                    ischeck: '',
                    selectedValue:0
                    
                }
            },
            created() {

                 this.axios.get('/api/job/occupationlist').then(function (response) {
                    this.OccupationList = response.data;
                  }.bind(this));

                 this.joboffer.employmentstatus = "ContractEmployee";
              
                 if(this.$route.params.id){
                 
                    this.axios
                        .get(`/api/job/edit/${this.$route.params.id}`)
                        .then((response) => {
                            this.joboffer.title = response.data.title;
                            this.joboffer.customer_id = response.data.customer_id;
                            this.selectedValue = response.data.occupation_id;
                            this.joboffer.description = response.data.description;
                            this.joboffer.fields.skills = response.data.skills;
                            let arr = [];
                            arr = (this.joboffer.fields.skills).split(',');
                            this.createskill(arr);
                            this.joboffer.location = response.data.location;
                            this.joboffer.nearest_station = response.data.nearest_station;
                            this.joboffer.employmentstatus = response.data.employment_status;
                            // this.ischeck = response.data.employment_status;
                            // this.createCheck(this.ischeck);
                            this.joboffer.salary = response.data.salary;
                            this.joboffer.allowances = response.data.allowances;
                            this.joboffer.insurance = response.data.insurance;
                            this.joboffer.working_hours = response.data.working_hours;
                            this.joboffer.holidays = response.data.holidays;
                            this.joboffer.user_id = response.data.user_id;
                            this.joboffer.recordstatus = response.data.recordstatus;
                        });
                }
            },
            methods: {
                add() {
                        if (this.$route.params.id) {
                            this.updateJob();
                        } else {
                            console.log(this.joboffer);
                           
                             this.axios.post('/api/job/add', this.joboffer)
                                .then((response) => {
                                    this.title = '',
                                        this.description = '',
                                        this.location = '',
                                        this.salary = '',
                                        this.working_hours = '',
                                        this.employment_status = ''
                                        console.log(response);
                                        this.$swal({
                                        position: 'top-end',
                                        type: 'success',
                                        title: '作成されました',
                                        showConfirmButton: false,
                                        timer: 1800,
                                        width: 250,
                                        height: 200,
                                    })
                                    // alert('Successfully Created')
                                    this.$router.push({
                                        name: 'jobofferlist'
                                    });
                                    this.$route.params.id = null;
                                }).catch(error => {
                                    if (error.response.status == 422) {
                                        this.errors = error.response.data.errors
                                    }
                                })

                        }
                    },
                     getParent: function(){
                        this.joboffer.occupation_id = this.selectedValue;
                       
                    },
                    addRow: function() {
                        this.joboffer.fields.push({
                            skills: '',
                            id: ''
                        });
                    },
                    delRow: function(id) {
                        this.joboffer.fields.splice(id, 1);
                        // this.joboffer.fields.pop();
                    },
                    createskill: function(arr) {
                        this.joboffer.fields.shift()
                        for (var i = 0; i < arr.length; i++) {
                            this.joboffer.fields.push({
                                skills: arr[i],
                                id: arr[i]
                            });
                        }
                    },
                    // createCheck: function(check) {
                    //     this.joboffer.employment_status.shift()
                    //     if (check == "Full") {
                    //         this.joboffer.employment_status.push({
                    //             fchecked: 1,
                    //         });
                    //     } else if (check == "Part") {
                    //         this.joboffer.employment_status.push({
                    //             pchecked: 1,
                    //         });
                    //     } else {
                    //         this.joboffer.employment_status.push({
                    //             fchecked: 1,
                    //             pchecked: 1
                    //         });
                    //     }
                    // },
                    updateJob() {
                        this.axios
                            .post(`/api/job/update/${this.$route.params.id}`, this.joboffer)
                            .then((response) => {
                                    this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: '作成されました',
                                showConfirmButton: false,
                                timer: 1800,
                                width: 250,
                                height: 200,
                            })
                                this.$router.push({
                                    name: 'jobofferlist'
                                });
                            }).catch(error => {
                                if (error.response.status == 422) {
                                    this.errors = error.response.data.errors
                                }
                            })
                    }
            }
    }
</script>

