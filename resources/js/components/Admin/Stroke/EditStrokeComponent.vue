<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Stroke</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateStroke">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="stroke">Stroke</label>
                     <input  v-model="form.stroke" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('stroke') }" id="stroke" placeholder="Stroke Name">
                        <has-error :form="form" field="stroke"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/strokelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditStroke',
       created () {
            document.title = "Edit Stroke";
        },
      mounted(){
          axios.get(`/admin/editstroke/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.stroke)
          })
      },
        data(){
        return {
          form: new Form({
            stroke:'',
          })
          
        }
    },
    
    
    methods: {
      updateStroke(){
        this.form.patch('/admin/updatestroke/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Stroke Update Successfull')],[this.$router.push('/admin/strokelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>