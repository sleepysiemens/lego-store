<template>
    <div>
        <div class="form-item w-100 mb-3 position-relative">
            <input type="text" class="form-control" @input="handleRegionInput" v-model="selectedRegion" placeholder="Регион">
            <div class="position-absolute card w-100 overflow-hidden" v-if="isRegionCardVisible">
                <div class="card-body p-0">
                    <p class="m-0 py-2 px-2" v-for="region in filteredRegions" :key="region" @click="selectRegion(region)">{{ region }}</p>
                </div>
            </div>
        </div>

        <div class="form-item w-100 mb-0 position-relative">
            <input type="text" class="form-control" @input="handleCityInput" v-model="selectedCity" placeholder="Город">
            <div class="position-absolute card w-100 overflow-hidden" v-if="isCityCardVisible">
                <div class="card-body p-0">
                    <p class="m-0 py-2 px-2" v-for="city in filteredCities" :key="city.city" @click="selectCity(city)">{{ city.city }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, computed } from 'vue';

export default {
    props: {
        regions: {
            type: Array,
            default: () => []
        },
        cities: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            isRegionCardVisible: false,
            isCityCardVisible: false,
            selectedRegion: '',
            selectedCity: ''
        };
    },
    computed: {
        filteredRegions() {
            const normalizedInput = this.selectedRegion.toLowerCase();
            return this.regions.filter(region => region.toLowerCase().includes(normalizedInput));
        },
        filteredCities() {
            const normalizedInput = this.selectedCity.toLowerCase();
            const selectedRegion = this.selectedRegion.toLowerCase(); // Добавляем выбранный регион
            return this.cities.filter(city => {
                // Фильтруем города по региону и введенному тексту
                return city.city.toLowerCase().includes(normalizedInput) && city.region.toLowerCase() === selectedRegion;
            });
        }
    },
    methods: {
        handleRegionInput() {
            this.isRegionCardVisible = true;
        },
        handleCityInput() {
            this.isCityCardVisible = true;
        },
        selectRegion(region) {
            this.selectedRegion = region;
            this.isRegionCardVisible = false;
        },
        selectCity(city) {
            this.selectedCity = city.city;
            this.isCityCardVisible = false;
        }
    }
};
</script>

<style scoped>
.card {
    z-index: 3;
}

p {
    transition: .3s;
}

p:hover {
    background-color: #f4f6f8;
    cursor: pointer;
    color: #81c408;
}
</style>
