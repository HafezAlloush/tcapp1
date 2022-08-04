<template>
    <div>
        <table id="example" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>PID</th>
                    <th>first_name</th>
                    <th>father_name</th>
                    <th>grand_name</th>
                    <th>family_name</th>
                </tr>
            </thead>
            <tbody>
                
                    <td>1</td>
                    <td>hafez</td>
                    <td>adnan</td>
                    <td>ali</td>
                    <td>alloush</td>
            
                <tr v-for="e in trainees">
                    <td>{{ e.PID }}</td>
                    <td>{{ e.first_name }}</td>
                    <td>{{ e.father_name }}</td>
                    <td>{{ e.grand_name }}</td>
                    <td>{{ e.family_name }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>PID</th>
                    <th>first_name</th>
                    <th>father_name</th>
                    <th>grand_name</th>
                    <th>family_name</th>
                </tr>
            </tfoot>
        </table>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            trainees: [],
        };
    },
    methods: {
        getEmp() {
            axios
                .get("trainees")
                .then((res) => {
                    this.trainees = res.data;
                    console.log(res.data);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    mounted: function () {
        $("#example").DataTable();
                this.getEmp();

    },
};
</script>
