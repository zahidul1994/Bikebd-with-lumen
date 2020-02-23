<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Gender</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateGender">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                     <input  v-model="form.gender" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('gender') }" id="gender" placeholder="Gender Name">
                        <has-error :form="form" field="gender"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/superadmin/genderlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditGender',
       created () {
            document.title = "Edit Gender";
        },
      mounted(){
          axios.get(`/superadmin/editgender/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.gender)
          })
      },
        data(){
        return {
          form: new Form({
            gender:'',
          })
          
        }
    },
    
    
    methods: {
      updateGender(){
        this.form.patch('/superadmin/updategender/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Gender Update Successfull')],[this.$router.push('/superadmin/genderlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>