var ArticList = function () {

    "use strict";



    function n() {

        return window.matchMedia("(min-width: 1200px)").matches ? 4 : window.matchMedia("(min-width: 992px)").matches ? 3 : window.matchMedia("(min-width: 768px)").matches ? 2 : window.matchMedia("(max-width: 767px)").matches ? 1 : 0

    }

    return {

        run: function (t, i, r, u, f, e, o) {

            function c() {

                if (window.matchMedia) {

                    var t = n();

                    t != s && ($.post(e, {

                        mq: t,

                        a: o

                    }, function (n) {

                        $("#artic_grid").html(n.articList)

                    }), s = t)

                }

            }

            var s;

            $("[id*='SelCategS']").click(function () {

                var n = $(this).attr("id"),

                    t = "#SelCategR" + n.replace("SelCategS", "");

                $(t).click()

            });

            $("[id*='SelSCategS']").click(function () {

                var n = $(this).attr("id"),

                    t = "#SelSCategR" + n.replace("SelSCategS", "");

                $(t).click()

            });

            var h = u.split("-"),

                l = parseInt(h[0], 10),

                a = parseInt(h[1], 10);

            

			$("#priceSlider").slider({

                range: !0,

                min: i,

                max: r,

                disabled: !1,

                animate: "slow",

                values: [l, a],

                slide: function (n, i) {

                    var r = i.values[0],

                        u = i.values[1];

                    $("#amountPriceVon").val(r + " " + t);

                    $("#amountPriceBis").val(u + " " + t)
			$( "#amount" ).val(r + " - " + u + " EUR");

                },

                change: function (n, t) {

                    var i = t.values[0],

                        r = t.values[1];

					

					var price_min = i,

						price_max = r;

                    

					$('input#price_min_slider').val( price_min );

					$('input#price_max_slider').val( price_max );

					

					// alert('ok');

					

					update_products_ajax();

					

					$("#PreisSpanne").val(i + "-" + r);

                    // $("#priceform").submit()

                }

            });

            $("#amountPriceVon").val($("#priceSlider").slider("values", 0) + " " + t);

            $("#amountPriceBis").val($("#priceSlider").slider("values", 1) + " " + t);

		$( "#amount" ).val( $("#priceSlider").slider("values", 0) + " - " + $("#priceSlider").slider("values", 1) + " EUR" );

            $(".cgform_imglbl").click(function () {

                $(this).prev().click()

            });

            $(".attrform_imglbl").click(function () {

                $(this).prev().prev().click()

            });

            s = 2;

            $("#mqdata").html(s);

            window.onresize = function () {

                c()

            }

        }

    }

}()