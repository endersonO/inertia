<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1>crear nueva materia</h1>
                
                <div class="border-gray-400 p-4 flex justify-between"> 
                    <form @submit.prevent="submit" class="flex justify-between">
                        <div> 
                            Materia :
                            <input type="text" class="form-input rounded-md shadow-sm " placeholder="Buscar..." v-model="form.course">
                        </div>

                        <div> 
                            docente :
                            <input type="text" class="form-input rounded-md shadow-sm " placeholder="Buscar..." v-model="form.teacher">
                        </div>

                        <div> 
                            tipo :
                            <input type="text" class="form-input rounded-md shadow-sm " placeholder="Buscar..." v-model="form.kindCurse">
                        </div>

                        <button> agregar </button>
                    </form>
                </div>
                <div v-show="false">
                    {{materEdit}}
                </div>
                
                <div v-if="edit" class="border-gray-400 p-4 flex justify-between"> 
                    <form @submit.prevent="update" class="flex justify-between">
                        <div> 
                            Materia :
                            <input type="text" class="form-input rounded-md shadow-sm " :placeholder="materEdit.course" v-model="materEdit.course">
                        </div>

                        <div> 
                            docente :
                            <input type="text" class="form-input rounded-md shadow-sm " :placeholder="materEdit.teacher" v-model="materEdit.teacher">
                        </div>

                        <div> 
                            tipo :
                            <input type="text" class="form-input rounded-md shadow-sm " :placeholder="materEdit.kindCurse" v-model="materEdit.kindCurse">
                        </div>

                        <button> Guardar </button>
                    </form>
                </div>
                <div class="border-gray-400 p-4 ">
                    <h1>Lista de materias</h1>
                    <div v-for="materia in materias" :key="materia.id" >
                        <div class="flex justify-between">
                            
                            <div>{{materia.id}}</div>
                            <div>{{materia.course}}</div>
                            <div>{{materia.teacher}}</div>
                            <div>{{materia.kindCurse}}</div>
                            <a href="#" @click.prevent="destroy(materia)">
                                Eliminar Materia
                            </a>
                            <a href="#" @click.prevent="edition(materia)">
                                Editar Materia
                            </a>


                        </div>
                        
                    </div>

                </div>
            </div>            
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout
        },
        props:{
            materias: Array
        },
        data(){
            return { 
                teacher : '',
                course: '',
                kindOfCourse: '',
                form : {
                    course : '',
                    teacher: '',
                    kindCurse: ''
                },
                edit : false,
                materEdit: ''
            }
        },
        watch: {

        },
        methods: {
            submit(){
                this.$inertia.post(this.route('materia.store'), this.form);
                location.reload();
            },
            update(){
                this.$inertia.put(this.route('materia.update', this.materEdit.id), this.materEdit)
                location.reload();
            },
            destroy(value){
                console.log(value.id);
                if (confirm('¿Desea Eliminar?')){
                    this.$inertia.delete(this.route('materia.destroy',value.id));
                    //location.reload();
                }
            },
            edition(value){
                this.edit = true,
                this.materEdit = value
                console.log(this.materEdit)
            }
        }
    }
</script>
