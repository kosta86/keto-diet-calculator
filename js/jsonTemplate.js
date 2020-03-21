var sedmodnevniPlan = {
  dan: {
    '1': {
      dorucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      rucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      vecera: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
    },
    '2': {
      dorucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      rucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      vecera: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
    },
    '3': {
      dorucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      rucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      vecera: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
    },
    '4': {
      dorucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      rucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      vecera: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
    },
    '5': {
      dorucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      rucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      vecera: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
    },
    '6': {
      dorucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      rucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      vecera: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
    },
    '7': {
      dorucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      rucak: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
      vecera: {
        naziv: null,
        sastojci: {

        },
        recept: null,
        nutritivnaVrednost: {
          kalorije: null,
          masti: null,
          proteini: null,
          uh: null
        }
      },
    },
  }
}


(function sendJSON(object) {
  fetch('./php/create_meal_plan.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: JSON.stringify(sedmodnevniPlan),
  })
})();
