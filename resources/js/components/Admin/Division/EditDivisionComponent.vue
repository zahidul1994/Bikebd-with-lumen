<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Division</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateDivision">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="division">Division</label>
                     <input  v-model="form.divisionname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('divisionname') }" id="division" placeholder="Division Name">
                        <has-error :form="form" field="divisionname"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/divisionlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditDivision',
       created () {
            document.title = "Edit Division";
        },
      mounted(){
          axios.get(`/admin/editdivision/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.division)
          })
      },
        data(){
        return {
          form: new Form({
            divisionname:'',
          })
          
        }
    },
    
    
    methods: {
      updateDivision(){
        this.form.patch('/admin/updatedivision/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Division Update Successfull')],[this.$router.push('/admin/divisionlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>