<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Permission</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="UpdatePermission">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Permission List</label>
                     <input  v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="name" placeholder="Permission Name">
                        <has-error :form="form" field="name"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/superadmin/permissionlist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditPermission',
        created () {
            document.title = "Edit Permission";
        },
      mounted(){
          axios.get(`/superadmin/editpermission/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.permission)
          })
      },
        data(){
        return {
          form: new Form({
            name:'',
          })
          
        }
    },
    
    
    methods: {
      UpdatePermission(){
        this.form.patch('/superadmin/updatepermission/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Permission Update Successfull')],[this.$router.push('/superadmin/permissionlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>