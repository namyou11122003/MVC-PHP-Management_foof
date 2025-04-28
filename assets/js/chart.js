const months = [
  "Jan",
  "Feb",
  "Mar",
  "Apr",
  "May",
  "Jun",
  "Jul",
  "Aug",
  "Sep",
  "Oct",
  "Nov",
  "Dec",
];
const currentMonth = new Date().getMonth();
const recentMonths = months.slice(
  Math.max(0, currentMonth - 5),
  currentMonth + 1
);

// Performance Chart
const performanceCtx = document
  .getElementById("performanceChart")
  .getContext("2d");
const performanceChart = new Chart(performanceCtx, {
  type: "line",
  data: {
    labels: recentMonths,
    datasets: [
      {
        label: "Revenue",
        data: [18500, 19200, 20100, 21800, 22400, 24500],
        borderColor: "#4a86e8",
        backgroundColor: "rgba(74, 134, 232, 0.1)",
        borderWidth: 2,
        fill: true,
        tension: 0.4,
      },
      {
        label: "Users",
        data: [9800, 10200, 10900, 11300, 11500, 12430],
        borderColor: "#34a853",
        backgroundColor: "rgba(52, 168, 83, 0.1)",
        borderWidth: 2,
        fill: true,
        tension: 0.4,
      },
      {
        label: "Orders",
        data: [950, 980, 1050, 1120, 1190, 1250],
        borderColor: "#4fc3f7",
        backgroundColor: "rgba(79, 195, 247, 0.1)",
        borderWidth: 2,
        fill: true,
        tension: 0.4,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
      title: {
        display: false,
      },
    },
    scales: {
      y: {
        beginAtZero: false,
      },
    },
  },
});

// Revenue vs Orders Chart
const revenueOrdersCtx = document
  .getElementById("revenueOrdersChart")
  .getContext("2d");
const revenueOrdersChart = new Chart(revenueOrdersCtx, {
  type: "bar",
  data: {
    labels: recentMonths,
    datasets: [
      {
        label: "Revenue ($)",
        data: [18500, 19200, 20100, 21800, 22400, 24500],
        backgroundColor: "rgba(74, 134, 232, 0.7)",
        yAxisID: "y",
      },
      {
        label: "Orders",
        data: [950, 980, 1050, 1120, 1190, 1250],
        backgroundColor: "rgba(79, 195, 247, 0.7)",
        yAxisID: "y1",
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
    },
    scales: {
      y: {
        type: "linear",
        display: true,
        position: "left",
        title: {
          display: true,
          text: "Revenue ($)",
        },
      },
      y1: {
        type: "linear",
        display: true,
        position: "right",
        grid: {
          drawOnChartArea: false,
        },
        title: {
          display: true,
          text: "Orders",
        },
      },
    },
  },
});

// User Growth Chart
const userGrowthCtx = document
  .getElementById("userGrowthChart")
  .getContext("2d");
const userGrowthChart = new Chart(userGrowthCtx, {
  type: "line",
  data: {
    labels: recentMonths,
    datasets: [
      {
        label: "Users",
        data: [9800, 10200, 10900, 11300, 11500, 12430],
        borderColor: "#34a853",
        backgroundColor: "rgba(52, 168, 83, 0.1)",
        borderWidth: 2,
        fill: true,
        tension: 0.4,
      },
      {
        label: "Growth Rate (%)",
        data: [null, 4.1, 6.9, 3.7, 1.8, 8.0],
        borderColor: "#fbbc04",
        backgroundColor: "rgba(251, 188, 4, 0.1)",
        borderWidth: 2,
        fill: true,
        tension: 0.4,
        yAxisID: "y1",
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
    },
    scales: {
      y: {
        type: "linear",
        display: true,
        position: "left",
        title: {
          display: true,
          text: "Users",
        },
      },
      y1: {
        type: "linear",
        display: true,
        position: "right",
        grid: {
          drawOnChartArea: false,
        },
        title: {
          display: true,
          text: "Growth Rate (%)",
        },
        min: 0,
        max: 10,
      },
    },
  },
});
