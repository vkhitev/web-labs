var models = require('./server/models/')
models.sequelize
  .authenticate()
  .then(() => {
    return models.sequelize.sync()
  })
  .then(function () {
    return models.Student.create({
      region: 0,
      form: 4,
      mark1: 10,
      mark2: 10,
      mark3: 10
    })
      .then(function (student) {
        console.log('OK')
      })
      .catch(function (error) {
        console.err(error)
      })
  })
  .catch(function (error) {
    console.log('Error creating connection:', error)
  })
