<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Bettery Voltage</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateVoltage">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bvoltage">Bettery Voltage</label>
                     <input  v-model="form.bvoltage" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bvoltage') }" id="bvoltage" placeholder="Bettery Voltage">
                        <has-error :form="form" field="bvoltage"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/bvoltagelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditBvoltage',
       created () {
            document.title = "Edit Bvoltage";
        },
      mounted(){
          axios.get(`/admin/editbvoltage/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.bvoltage)
          })
      },
        data(){
        return {
          form: new Form({
            bvoltage:'',
          })
          
        }
    },
    
    
    methods: {
      updateVoltage(){
        this.form.patch('/admin/updatebvoltage/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Bettery Voltage Update Successfull')],[this.$router.push('/admin/bvoltagelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>