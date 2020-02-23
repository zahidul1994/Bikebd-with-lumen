<template>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateStatus">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="gender">Status</label>
                     <input  v-model="form.status_name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('status_name') }" id="gender" placeholder="Gender Name">
                        <has-error :form="form" field="status_name"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/superadmin/statuslist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>
</template>

<script>
    export default {
      name:'EditStatus',
       created () {
            document.title = "Edit Status";
        },
      mounted(){
          axios.get(`/superadmin/editstatus/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.status)
          })
      },
        data(){
        return {
          form: new Form({
            status_name:'',
          })
          
        }
    },
    
    
    methods: {
      updateStatus(){
        this.form.patch('/superadmin/updatestatus/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Status Update Successfull')],[this.$router.push('/superadmin/statuslist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>