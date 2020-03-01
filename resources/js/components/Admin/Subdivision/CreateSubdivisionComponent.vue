<template>
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Sub-Division</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addSubDivision">
             
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
                    <label for="subdivision">Sub-Division</label>
                     <input  v-model="form.subdivisionname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('subdivisionname') }" id="subdivision" placeholder="Sub-Division Name">
                        <has-error :form="form" field="subdivisionname"></has-error>
                  </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/admin/subdivisionlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>
                
            <!-- /.card -->


       
            
</template>

<script>
export default {
  name: "Subdivision",
   created () {
            document.title = "Create Sub-Division";
        },
  data() {
    return {
      form: new Form({
        division_id: "",
        subdivisionname: ""
      })
    };
  },
 mounted() {
    this.$store.dispatch("allDivision"); //for show Division
  },
    computed: {
    allDivision() {
      return this.$store.getters.getDivision; //for get Division
      
    }
  },
  methods: {
    
       addSubDivision() {
      this.form
        .post("/admin/createsubdivision")
        //console.log('ok');
        .then(({ response }) => {
          [toastr.success("Sub-Division Create Successfull")],
            [this.$router.push("/admin/subdivisionlist")];
        })
        .catch(function(response) {
          console.log(response);
          toastr.warning("Sorry Try Agin");
        });
    }
  }
};
</script>