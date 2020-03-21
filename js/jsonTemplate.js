
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

var sedmodnevni_plan = {
  dan: {
    1: {
      dorucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      rucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      vecera: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      }
    },

    2: {
      dorucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      rucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      vecera: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      }
    },

    3: {
      dorucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      rucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      vecera: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      }
    },

    4: {
      dorucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      rucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      vecera: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      }
    },

    5: {
      dorucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      rucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      vecera: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      }
    },

    6: {
      dorucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      rucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      vecera: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      }
    }, 

    7: {
      dorucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      rucak: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      },
      vecera: {
        naziv: null,
        sastojci: null,
        recept: null,
        kalorije: null,
        masti: null,
        proteini: null,
        uh
      }
    }
    
  },
  kalorije
}

