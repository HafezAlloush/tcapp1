<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <button
                            class="btn btn-success middle"
                            v-on:click="getdata()"
                        >
                            click me1
                        </button>

                        I'm an example component.
                        <div id="jsGrid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
       return{
        tableData:[],
        grid,
       };
    },

    mounted: function () {
       
        // /*generate junk data*/
        // for (let i=0; i< 100; i++) {
        //   tableData.push({ "Name": "Client " + i, "Age": 25, "Country": 1, "Address": "Ap #897-1459 Quam Avenue", "Married": false });
        // }
        axios
            .get("/deplist")
            .then((res) => {
                this.tableData = res.data;
                
            })
            .catch((err) => {
                console.error(err);
            });
        console.log(this.tableData);
        this.grid = $("#jsGrid");
        this.grid.jsGrid({
            //filtering: true,
            width: "100%",
            height: "400px",
            selecting: true,
            inserting: false,
            editing: true,
            sorting: true,
            paging: true,
            controller: this.clients,

            fields: [
                {
                    name: "Name",
                    type: "text",
                    width: 150,
                    validate: "required",
                },

                { type: "control" },
            ],
        });
    },
};
</script>
