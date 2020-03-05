<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Gear</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateGear">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="gear">Gear</label>
                     <input  v-model="form.gear" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('gear') }" id="gear" placeholder="Gear">
                        <has-error :form="form" field="gear"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/gearlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditGear',
       created () {
            document.title = "Edit Gear";
        },
      mounted(){
          axios.get(`/admin/editgear/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.gear)
          })
      },
        data(){
        return {
          form: new Form({
            gear:'',
          })
          
        }
    },
    
    
    methods: {
      updateGear(){
        this.form.patch('/admin/updategear/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Gear Update Successfull')],[this.$router.push('/admin/gearlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>