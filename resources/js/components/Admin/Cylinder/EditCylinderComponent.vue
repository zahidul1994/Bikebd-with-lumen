<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Cylinder</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateCylinder">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="cylinder">Cylinder</label>
                     <input  v-model="form.cylinder" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('cylinder') }" id="cylinder" placeholder="Cylinder Name">
                        <has-error :form="form" field="cylinder"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/cylinderelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditCylinder',
       created () {
            document.title = "Edit Cylinder";
        },
      mounted(){
          axios.get(`/admin/editcylinder/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.cylinder)
          })
      },
        data(){
        return {
          form: new Form({
            cylinder:'',
          })
          
        }
    },
    
    
    methods: {
      updateCylinder(){
        this.form.patch('/admin/updatecylinder/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Cylinder Update Successfull')],[this.$router.push('/admin/cylinderelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>