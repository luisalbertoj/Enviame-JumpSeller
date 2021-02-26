/**
 * JumpController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */
const request = require("request");

module.exports = {
  test: function (req, res) {
    let params = req.allParams();
    params = {
        request: {
            to: {
                municipality: 'Quilicura'
            },
            package: {
                weight: '15'
            }
        }
    };
    console.log(params);

    console.log(params.request.to.municipality);
    console.log(params.request.package.weight);

    const options = {
      url:
        "https://facturacion.enviame.io/api/v1/prices?from_place=Pudahuel&to_place=" +
        params.request.to.municipality +
        "&weight=" +
        params.request.package.weight,
      headers: {
        Accept: "application/json",
        "x-api-key": "afw6mcptnjy448t227a1vh74lcv36jhz",
      },
    };

    request(options, (err, data, body) => {
      if (err) {
        return console.log(err);
        res.ok();
      }
      console.log(body.url);
      console.log(body.explanation);
      console.log(data);
      console.log(data)
      let dataFormated = JSON.parse(body);
      if (!dataFormated["data"]) {
        res.ok();
      } else {
        let response = [];
        for (const i of dataFormated["data"]) {
            for (const s of i["services"]) {
                response.push(
                    {
                        "service_name" : i["name"] + " - " + s["name"] + " 1 a 3 días hábiles:",
                        "service_code" : s["code"],
                        "total_price" : s["price"]
                    }
                );
            }
        }
        console.log({rates: response});
        res.ok({"rates": response});
      }
    });
  },
};
