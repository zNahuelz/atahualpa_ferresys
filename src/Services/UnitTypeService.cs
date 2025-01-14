﻿using atahualpa_ferresys.Entities;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace atahualpa_ferresys.Services
{
    public class UnitTypeService
    {
        private readonly HttpClient _httpClient;

        public UnitTypeService(string baseURL, string token)
        {
            _httpClient = new HttpClient();
            {
                _httpClient.BaseAddress = new Uri(baseURL);
            };
            _httpClient.DefaultRequestHeaders.Authorization =
                new System.Net.Http.Headers.AuthenticationHeaderValue("Bearer", token);
        }

        public async Task<List<UnitType>> GetUnitTypes()
        {
            var response = await _httpClient.GetAsync("unit_type");
            response.EnsureSuccessStatusCode();
            var json = await response.Content.ReadAsStringAsync();
            return JsonConvert.DeserializeObject<List<UnitType>>(json);
        }

    }
}
