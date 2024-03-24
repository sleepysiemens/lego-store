<template>
    <div class="position-relative mx-auto z-1">
        <input ref="searchInput" class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill position-absolute" type="text" placeholder="Поиск" v-model="searchQuery" @input="search">
        <a :href="'/shop/?search='+searchQuery" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 25%;">
            <i class="fas fa-search me-2"></i>Найти
        </a>

        <div class="card position-absolute w-75 top-0 bg-white" v-if="searchQuery!==''">
            <div class="card-body mt-5 pt-4">
                <a :href="'/shop/'+result.number" class="row border-bottom" v-for="result in getDisplayResults()" :key="result.id" style="font-size: 14px; color: rgba(0,0,0,.75) !important;">
                    <div class="col-4">
                        <div class="d-flex align-items-center">
                            <img :src="'https://img.bricklink.com/ItemImage/PN/' + result.color_id + '/' + result.bricklink_number + '.png'" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: contain" alt="">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <p class="mb-1 mt-3 title_">{{result.title}}</p>
                        </div>
                        <div class="row">
                            <p class="mb-2 mt-2 col-6">Цена: {{result.price}} ₽</p>
                            <p class="mb-2 mt-2  col-6">Кол-во: {{result.amount}}</p>
                        </div>
                    </div>
                </a>
                <p class="text-center mt-3" v-if="searchResults.length === 0 && searchQuery!==''">Ничего не найдено</p>
                <div class="row">
                    <a :href="'/shop/?search='+searchQuery" class="text-center mx-auto mt-2" v-if="searchResults.length > 0 && searchQuery!==''">Все результаты</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {

    data()
    {
        return {
                searchQuery:'',
            searchResults: [],
        };
    },

    methods:
        {
            search()
            {
                if (typeof this.searchQuery === 'string' && this.searchQuery.trim() !== '')
                {
                    this.searchResults = this.fakeSearch(this.searchQuery);
                } else
                {
                    this.searchResults = [];
                }
            },
            fakeSearch(query)
            {
                const data = window.products || [];
                const filteredData = data.filter(item => {
                    if (typeof item.title === 'string') {
                        return item.search_line.toLowerCase().includes(query.toLowerCase());
                    }
                    return false;
                });

                // Ограничиваем результаты до первых 10 элементов
                return filteredData.slice(0, 5);
            },


            getDisplayResults() {
                if (this.searchQuery.trim())
                {
                    return this.searchResults;
                }
            },

        },
}
</script>

<style scoped>

.card
{
    z-index: 1;
    border-radius: 30px;
}

.btn
{
    z-index: 3;
    height: 60px;
}
input
{
    z-index: 2;
}

</style>
