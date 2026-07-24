! function(e) {
    var t = {};

    function a(n) { if (t[n]) return t[n].exports; var r = t[n] = { i: n, l: !1, exports: {} }; return e[n].call(r.exports, r, r.exports, a), r.l = !0, r.exports } a.m = e, a.c = t, a.d = function(n, r, e) { a.o(n, r) || Object.defineProperty(n, r, { enumerable: !0, get: e }) }, a.r = function(n) { "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(n, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(n, "__esModule", { value: !0 }) }, a.t = function(r, n) {
        if (1 & n && (r = a(r)), 8 & n) return r;
        if (4 & n && "object" == typeof r && r && r.__esModule) return r;
        var e = Object.create(null);
        if (a.r(e), Object.defineProperty(e, "default", { enumerable: !0, value: r }), 2 & n && "string" != typeof r)
            for (var t in r) a.d(e, t, function(n) { return r[n] }.bind(null, t));
        return e
    }, a.n = function(n) { var r = n && n.__esModule ? function() { return n.default } : function() { return n }; return a.d(r, "a", r), r }, a.o = function(n, r) { return Object.prototype.hasOwnProperty.call(n, r) }, a.p = "", a(a.s = 4)
}({
    "./app/assets/es6/constant/theme-constant.js": function(module, __webpack_exports__, __webpack_require__) {
        "use strict";
        eval("__webpack_require__.r(__webpack_exports__);\n
            const ThemeConstant = {
               
                magenta: '#eb2f96',
                magentaLight: 'rgba(235, 47, 150, 0.05)',
                red: '#de4436',
                redLight: 'rgba(222, 68, 54, 0.05)',
                volcano: '#fa541c',
                volcanoLight: 'rgba(250, 84, 28, 0.05)',
                orange: '#fa8c16',
                orangeLight: 'rgba(250, 140, 22, 0.1)',
                gold: '#ffc107',
                goldLight: 'rgba(255, 193, 7, 0.1)',
                lime: '#a0d911',
                limeLight: 'rgba(160, 217, 17, 0.1)',
                green: '#52c41a',
                greenLight: 'rgba(82, 196, 26, 0.1)',
                cyan: \"#05c9a7\",
                cyanLight: 'rgba(0, 201, 167, 0.1)',
                blue: '#3f87f5',
                blueLight: 'rgba(63, 135, 245, 0.15)',
                geekBlue: '#2f54eb',
                geekBlueLight: 'rgba(47, 84, 235, 0.1)',
                purple: '#886cff',
                purpleLight: 'rgba(136, 108, 255, 0.1)',
                gray: '#53535f',
                grayLight: '#77838f',
                grayLighter: '#ededed',
                grayLightest: '#f1f2f3',
                border: '#edf2f9',
                white: '#ffffff',
                dark: '#2a2a2a',
                transparent: 'rgba(255, 255, 255, 0)'
            }
            /* harmony default export */ __webpack_exports__[\"default\"] = (ThemeConstant);\n\n//# sourceURL=webpack:///./app/assets/es6/constant/theme-constant.js?")
    },
    "./app/assets/es6/pages/dashboard-default.js": function(module, __webpack_exports__, __webpack_require__) {
        "use strict";
        eval('__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../constant/theme-constant */ "./app/assets/es6/constant/theme-constant.js");\n
        class DashboardDefault {
                static init() {
                    const revenueChartConfig = new Chart(document.getElementById("revenue-chart").getContext(\'2d\'), {
                                    type: \'line\',
                                    data: {
                                        labels: ["16th", "17th", "18th", "19th", "20th", "21th", "22th", "23th", "24th", "25th", "26th"],
                                        datasets: [{
                                            label: \'Series A\',
                                            backgroundColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].transparent,
                                            borderColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].blue,
                                            pointBackgroundColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].blue,
                                            pointBorderColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].white,
                                            pointHoverBackgroundColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].blueLight,
                                            pointHoverBorderColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].blueLight,
                                            data: [30, 60, 40, 50, 40, 55, 85, 65, 75, 50, 70]
                        
                                    }]
                            },
                                options: {
                                        legend: {
                                            display: false
                        
                                    },
                                    maintainAspectRatio: false,
                                    responsive: true,
                                    hover: {
                                            mode: \'nearest\',
                                            intersect: true
                        
                                    },
                                    tooltips: {
                                            mode: \'index\'
                        
                                    },
                                    scales: {
                                            xAxes: [{ 
                                                gridLines: [{
                                                    display: false,
                        
                                            }],
                                            ticks: {
                                                    display: true,
                                                    fontColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].grayLight,
                                                    fontSize: 13,
                                                    padding: 10
                        
                                            }
                                    }],
                                        yAxes: [{
                                                gridLines: {
                                                    drawBorder: false,
                                                    drawTicks: false,
                                                    borderDash: [3, 4],
                                                    zeroLineWidth: 1,
                                                    zeroLineBorderDash: [3, 4]  
                        
                                            },
                                            ticks: {
                                                    display: true,
                                                    max: 100,                            
                                                    stepSize: 20,
                                                    fontColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].grayLight,
                                                    fontSize: 13,
                                                    padding: 10
                        
                                            }  
                                    }],
                                }
                            }
                        });
                const customersChartConfig = new Chart(document.getElementById("customers-chart").getContext(\'2d\'), {
                                type: \'doughnut\',
                                data: {
                                    labels: [\'New\', \'Returning\', \'Others\'],
                                    datasets: [{
                                        label: \'Series A\',
                                        backgroundColor: [_constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].cyan, _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].purple, _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].gold],
                                        pointBackgroundColor : [_constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].cyan, _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].purple, _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].gold],
                                        data: [350, 450, 100]
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    cutoutPercentage: 75,
                                    maintainAspectRatio: false
                                }
                            });
                const avgProfitChartConfig = new Chart(document.getElementById("avg-profit-chart").getContext(\'2d\'), {
                                type: \'bar\',
                                data: {
                                    labels: [\'Mar\', \'Apr\', \'May\', \'Jun\', \'Jul\', \'Aug\', \'Sep\'],
                                    datasets: [
                                        {
                                            label: \'Series A\',
                                            backgroundColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].blue,
                                            borderWidth: 0,
                                            data: [38, 38, 30, 19, 56, 55, 31]
                    
                                    },
                                    {
                                            label: \'Series B\',
                                            backgroundColor: _constant_theme_constant__WEBPACK_IMPORTED_MODULE_0__["default"].blueLight,
                                            borderWidth: 0,
                                            data: [55, 69, 90, 81, 86, 27, 77]
                    
                                    }
                            ]
                        },
                            options: {
                                    legend: {
                                        display: false
                    
                                },
                                scaleShowVerticalLines: false,
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                        xAxes: [{
                                            categoryPercentage: 0.35,
                                            barPercentage: 0.3,
                                            display: true,
                                            stacked: true,
                                            scaleLabel: {
                                                display: false,
                                                labelString: \'Month\'
                    
                                        },
                                            gridLines: false,
                                            ticks: {
                                                display: true,
                                                beginAtZero: true,
                                                fontSize: 13,
                                                padding: 10
                    
                                        }
                                    }],
                                    yAxes: [{
                                            categoryPercentage: 0.35,
                                            barPercentage: 0.3,
                                            display: true,
                                            stacked: true,
                                            scaleLabel: {
                                                display: false,
                                                labelString: \'Value\'
                    
                                        },
                                            gridLines: {
                                                drawBorder: false,
                                                offsetGridLines: false,
                                                drawTicks: false,
                                                borderDash: [3, 4],
                                                zeroLineWidth: 1,
                                                zeroLineBorderDash: [3, 4]
                    
                                        },
                                        ticks: {                           
                                                stepSize: 40,
                                                display: true,
                                                beginAtZero: true,
                                                fontSize: 13,
                                                padding: 10
                    
                                        }
                                }]
                            }
                        }
                    });
                }
            }
        $(() => { DashboardDefault.init(); });
        \n\n//# sourceURL=webpack:///./app/assets/es6/pages/dashboard-default.js?')
    },
    4: function(module, exports, __webpack_require__) { eval('module.exports = __webpack_require__(/*! C:\\Users\\Nate\\Desktop\\themeforest selling\\Enlink-bootstrap\\v1.0.1\\demo\\app\\assets\\es6\\pages\\dashboard-default.js */"./app/assets/es6/pages/dashboard-default.js");\n\n\n//# sourceURL=webpack:///multi_./app/assets/es6/pages/dashboard-default.js?') }
});
