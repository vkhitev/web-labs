var models = require('./server/models/')
models.sequelize
  .authenticate().then(() => {
    models.Student.create({
      region: 0,
      form: 2,
      mark_mean: 100
    })
    console.log('Everything ok')
  })
  .catch(function (error) {
    console.log('Error creating connection:', error)
  })
