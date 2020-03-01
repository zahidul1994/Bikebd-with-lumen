<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Sub-Division</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateSubDivision">
                <div class="card-body">
                   <div class="form-group">
                    <label for="accounttype">Select Account Type *</label>
                    <select   class="form-control" :class="{'is-invalid' :form.errors.has('division_id')}" v-model="form.division_id">
                        <option disabled value="">Select One</option>
                      <option  v-for="division_id in allDivision" :value="division_id._id">{{division_id.divisionname}}</option>
                    
                    </select>
                     <has-error :form="form" field="division_id"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="division">Division</label>
                     <input  v-model="form.subdivisionname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('subdivisionname') }" id="division" placeholder="Division Name">
                        <has-error :form="form" field="subdivisionname"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/subdivisionlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditSubDivision',
       created () {
            document.title = "Edit Sub-Division";
        },
      mounted(){
        
    this.$store.dispatch("allDivision"); //for show Division
 
          axios.get(`/admin/editsubdivision/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.subdivision)
          })
      },
        computed: {
   allDivision() {
      return this.$store.getters.getDivision; //for get Division
      
    }
  },
      
        data(){
        return {
          form: new Form({
            subdivisionname:'',
            division_id: "",
          })
          
        }
    },
    
    
    methods: {
      updateSubDivision(){
        this.form.patch('/admin/updatesubdivision/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Sub-Division Update Successfull')],[this.$router.push('/admin/subdivisionlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>