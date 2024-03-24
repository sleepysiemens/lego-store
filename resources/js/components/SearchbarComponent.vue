<template>
    <div class="position-relative">
        <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4 opacity-0"><i class="fas fa-search text-primary"></i></button>
        <div class="position-absolute h-100 top-0 me-4" style="right: 0" :class="{ 'searchbar': isComponentVisible, 'searchbar-hidden': !isComponentVisible }">
            <div class="position-relative w-100 h-100">
                <input ref="searchInput" class="form-control h-100 rounded-pill position-absolute border-secondary" style="z-index: 2" placeholder="Поиск" v-model="searchQuery" @input="search">
                <button class="btn border border-secondary btn-primary btn-md-square rounded-circle bg-white position-absolute" style="right: 0; z-index: 3" @click="toggleComponent">
                    <i class="fas fa-arrow-right text-primary" :class="{ 'd-block': isComponentVisible, 'd-none': !isComponentVisible }"></i>
                    <i class="fas fa-search text-primary" :class="{ 'd-none': isComponentVisible, 'd-block': !isComponentVisible }"></i>
                </button>
                <div class="position-absolute w-100 bg-primary top-0 bg-white card border-secondary " style="z-index: 1; border-radius: 25px" v-if="searchQuery!==''">
                    <div class="card-body mt-5">
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
                        <p class="text-center" v-if="searchResults.length === 0 && searchQuery!==''">Ничего не найдено</p>
                        <div class="row">
                            <a :href="'/shop/?search='+searchQuery" class="text-center mx-auto mt-2" v-if="searchResults.length > 0 && searchQuery!==''">Все результаты</a>
                        </div>
                    </div>
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
            isComponentVisible: false,
            searchQuery:'',
            searchResults: [],
        };
    },

    methods:
        {
            toggleComponent()
            {
                this.isComponentVisible=!this.isComponentVisible
            },
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
.searchbar {
    transition: .3s;
    width: 400px !important;
    display: block;
}

.searchbar-hidden {
    transition: .3s;
    z-index: 1;
    width: 40px !important;
    opacity: 0;
    animation-name: searchbar-hide;
    animation-duration: .5s;
}

.title_
{
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

</style>
